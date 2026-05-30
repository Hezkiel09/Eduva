<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\AssessmentSession;
use App\Models\Answer;
use App\Models\AssessmentResult;
use App\Models\CareerTrack;
use App\Models\SkillGap;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessment = Assessment::first();

        $activeSession = AssessmentSession::where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->latest('started_at')
            ->first();

        $lastResult = AssessmentResult::where('user_id', Auth::id())
            ->latest('submitted_at')
            ->first();

        return view('assessment.index', compact('assessment', 'activeSession', 'lastResult'));
    }

    public function start(Request $request)
    {
        $assessment = Assessment::first();

        AssessmentSession::where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->update(['session_status' => 'abandoned']);

        $session = AssessmentSession::create([
            'user_id'             => Auth::id(),
            'assessment_id'       => $assessment->assessment_id,
            'session_status'      => 'in_progress',
            'progress_percentage' => 0,
        ]);

        return redirect()->route('assessment.question', [
            'session' => $session->session_id,
            'order'   => 1,
        ]);
    }

    public function showQuestion($sessionId, $order)
    {
        $session = AssessmentSession::where('session_id', $sessionId)
            ->where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->firstOrFail();

        $assessment = $session->assessment;

        $totalQuestions = $assessment->questions()->count();

        if ($order < 1 || $order > $totalQuestions) {
            return redirect()->route('assessment.index');
        }

        $question = $assessment->questions()
            ->where('order_number', $order)
            ->with('options')
            ->firstOrFail();

        $existingAnswer = Answer::where('session_id', $sessionId)
            ->where('question_id', $question->question_id)
            ->first();

        $session->update([
            'progress_percentage' => round(($order - 1) / $totalQuestions * 100, 2)
        ]);

        return view('assessment.question', compact(
            'session',
            'question',
            'order',
            'totalQuestions',
            'existingAnswer'
        ));
    }

    public function submitAnswer(Request $request, $sessionId)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,question_id',
            'option_id'   => 'required|exists:options,option_id',
            'order'       => 'required|integer',
        ]);

        $session = AssessmentSession::where('session_id', $sessionId)
            ->where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->firstOrFail();

        Answer::updateOrCreate(
            [
                'session_id'  => $sessionId,
                'question_id' => $request->question_id,
            ],
            [
                'option_id' => $request->option_id,
            ]
        );

        $totalQuestions = $session->assessment->questions()->count();
        $nextOrder = $request->order + 1;

        if ($nextOrder <= $totalQuestions) {
            return redirect()->route('assessment.question', [
                'session' => $sessionId,
                'order'   => $nextOrder,
            ]);
        }

        return redirect()->route('assessment.finish.confirm', [
            'session' => $sessionId,
        ]);
    }

    public function confirmFinish($sessionId)
    {
        $session = AssessmentSession::where('session_id', $sessionId)
            ->where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->firstOrFail();

        $totalQuestions = $session->assessment->questions()->count();
        $answeredCount  = $session->answers()->count();

        return view('assessment.confirm', compact('session', 'totalQuestions', 'answeredCount'));
    }

    public function finish($sessionId)
    {
        $session = AssessmentSession::where('session_id', $sessionId)
            ->where('user_id', Auth::id())
            ->where('session_status', 'in_progress')
            ->with('answers.option') // ambil semua jawaban + options sekaligus
            ->firstOrFail();

        $scores = [
            'frontend' => 0,
            'backend'  => 0,
            'uiux'     => 0,
            'data'     => 0,
            'ai'       => 0,
            'cyber'    => 0,
        ];

        foreach ($session->answers as $answer) {
            foreach ($answer->option->scores as $track => $value) {
                $scores[$track] += $value;
            }
        }

        arsort($scores);

        $topTrack   = array_key_first($scores);
        $totalScore = array_sum($scores);

        $readinessLevel = match (true) {
            $totalScore >= 90 => 'advanced',
            $totalScore >= 50 => 'intermediate',
            default           => 'beginner',
        };

        $careerTrack = CareerTrack::where('slug', $topTrack)->firstOrFail();

        $result = AssessmentResult::create([
            'session_id'      => $session->session_id,
            'user_id'         => Auth::id(),
            'track_id'        => $careerTrack->track_id,
            'track_scores'    => $scores,
            'top_track'       => $topTrack,
            'readiness_level' => $readinessLevel,
        ]);

        $maxScore = max($scores);
        foreach ($scores as $track => $score) {
            if ($track !== $topTrack) {
                $percentage = $maxScore > 0 ? ($score / $maxScore) * 100 : 0;
                $gapLevel = match (true) {
                    $percentage < 30 => 'high',
                    $percentage < 60 => 'medium',
                    default          => 'low',
                };

                SkillGap::create([
                    'result_id'  => $result->result_id,
                    'skill_name' => $careerTrack->title . ' — ' . ucfirst($track),
                    'gap_level'  => $gapLevel,
                ]);
            }
        }
        $session->update([
            'session_status'      => 'completed',
            'progress_percentage' => 100,
            'ended_at'            => now(),
        ]);
        return redirect()->route('result.show', ['result' => $result->result_id]);
    }
}
