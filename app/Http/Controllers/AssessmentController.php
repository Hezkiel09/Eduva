<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\Recommendation;

class AssessmentController extends Controller
{
    public function submitAssessment(Request $request)
    {
        $totalScore = 0;
        foreach ($request->answers as $questionId => $answerData) {
            Answer::create([
                'user_id' => Auth::id(),
                'question_id' => $questionId,
                'answer' => $answerData['answer'],
                'score' => $answerData['score']
            ]);

            $totalScore += $answerData['score'];
        }

        $recommendation = Recommendation::where('min_score', '<=', $totalScore)
            ->where('max_score', '>=', $totalScore)
            ->first();
        if ($recommendation) {
            return response()->json([
                'status' => 'success',
                'recommended_bootcamp' => $recommendation->bootcamp_name
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Rekomendasi tidak ditemukan'
            ]);
        }
    }
}