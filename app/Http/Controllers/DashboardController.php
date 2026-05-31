<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\AssessmentResult;
use App\Models\AssessmentSession;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $lastResult = AssessmentResult::with('careerTrack')
            ->where('user_id', $user->id)
            ->latest('submitted_at')
            ->first();

        $activeSession = AssessmentSession::where('user_id', $user->id)
            ->where('session_status', 'in_progress')
            ->latest('started_at')
            ->first();

        
        $totalCompleted = AssessmentResult::where('user_id', $user->id)->count();

        
        $recentResults = AssessmentResult::with('careerTrack')
            ->where('user_id', $user->id)
            ->latest('submitted_at')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'user',
            'lastResult',
            'activeSession',
            'totalCompleted',
            'recentResults',
        ));
    }
}
