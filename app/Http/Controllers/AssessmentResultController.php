<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AssessmentResult;

class AssessmentResultController extends Controller
{
    public function show($resultId)
    {
        $result = AssessmentResult::with([
            'careerTrack.bootcamps', 
            'skillGaps',             
            'session',               
        ])
        ->where('result_id', $resultId)
        ->where('user_id', Auth::id()) 
        ->firstOrFail();

        $trackScores = $result->track_scores;
        arsort($trackScores);

        $trackLabels = [
            'frontend' => 'Frontend Developer',
            'backend'  => 'Backend Developer',
            'uiux'     => 'UI/UX Designer',
            'data'     => 'Data Scientist',
            'ai'       => 'AI Engineer',
            'cyber'    => 'Cyber Security',
        ];

        $maxScore = max($trackScores) > 0 ? max($trackScores) : 1;
        $trackPercentages = [];
        foreach ($trackScores as $track => $score) {
            $trackPercentages[$track] = round(($score / $maxScore) * 100);
        }

        return view('assessment.result', compact(
            'result',
            'trackScores',
            'trackLabels',
            'trackPercentages',
        ));
    }

    public function history()
    {
        $results = AssessmentResult::with('careerTrack')
            ->where('user_id', Auth::id())
            ->orderBy('submitted_at', 'desc')
            ->get();

        return view('assessment.history', compact('results'));
    }
}