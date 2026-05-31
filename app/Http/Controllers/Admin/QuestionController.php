<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Tampilkan semua soal assessment (view-only).
     * Soal bersifat statis dan dikelola via seeder.
     */
    public function index()
    {
        $assessment = Assessment::with(['questions.options'])->first();

        $questions = $assessment
            ? $assessment->questions()->with('options')->orderBy('order_number')->get()
            : collect();

        return view('admin.questions.index', compact('assessment', 'questions'));
    }
}
