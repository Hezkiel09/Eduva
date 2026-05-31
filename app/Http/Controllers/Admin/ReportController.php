<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentResult;
use App\Models\User;

class ReportController extends Controller
{
    /**
     * Laporan semua hasil assessment siswa (F-09).
     */
    public function index()
    {
        $results = AssessmentResult::with(['user', 'careerTrack'])
            ->latest('submitted_at')
            ->paginate(20);

        return view('admin.reports.index', compact('results'));
    }

    /**
     * Detail hasil assessment satu siswa tertentu.
     */
    public function showUser(User $user)
    {
        $results = AssessmentResult::with(['careerTrack', 'skillGaps'])
            ->where('user_id', $user->id)
            ->latest('submitted_at')
            ->get();

        return view('admin.reports.user', compact('user', 'results'));
    }
}
