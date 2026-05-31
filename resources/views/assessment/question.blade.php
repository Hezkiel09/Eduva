@extends('layouts.app')

@section('content')
<style>
    .layout-split {
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }
    .sidebar {
        width: 250px;
        background: white;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
    .main-content {
        flex: 1;
        background: white;
        padding: 30px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
    .progress-bar-container {
        background-color: #e0e0e0;
        border-radius: 10px;
        height: 8px;
        width: 100%;
        margin-top: 10px;
    }
    .progress-bar {
        background-color: #2563EB;
        height: 100%;
        border-radius: 10px;
    }
    .option-card {
        display: block;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        cursor: pointer;
    }
    .option-card:hover {
        background-color: #f9f9f9;
        border-color: #2563EB;
    }
    .btn-nav {
        background: white;
        border: 1px solid #ccc;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }
    .btn-next {
        background: #000;
        color: white;
        border: none;
    }
    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
</style>

<div class="layout-split">
    <!-- Sidebar / Progress -->
    <div class="sidebar">
        <h4>Progress Pengerjaan</h4>
        @php
            $percentage = round((($order - 1) / $totalQuestions) * 100);
        @endphp
        <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span>{{ $order - 1 }} dari {{ $totalQuestions }} Selesai</span>
            <strong>{{ $percentage }}%</strong>
        </div>
        <div class="progress-bar-container">
            <div class="progress-bar" style="width: {{ $percentage }}%;"></div>
        </div>
        
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        <ul style="list-style: none; padding: 0; line-height: 2;">
            <li>🏠 Home</li>
            <li style="color: #2563EB; font-weight:bold;">📝 Assessment</li>
            <li>🎯 Career Match</li>
            <li>📚 Learning Path</li>
        </ul>
    </div>

    <!-- Main Content / Question -->
    <div class="main-content">
        <div style="font-size: 12px; font-weight: bold; background: #000; color: white; display: inline-block; padding: 4px 8px; border-radius: 4px; margin-bottom: 10px;">
            Pertanyaan {{ $order }} dari {{ $totalQuestions }}
        </div>
        
        <h2 style="margin-top: 0;">{{ $question->question_text }}</h2>

        <form action="{{ route('assessment.answer', $session->session_id) }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->question_id }}">
            <input type="hidden" name="order" value="{{ $order }}">

            @foreach($question->options as $option)
                <label class="option-card">
                    <input type="radio" name="option_id" value="{{ $option->option_id }}" required 
                        {{ ($existingAnswer && $existingAnswer->option_id == $option->option_id) ? 'checked' : '' }}
                    > 
                    {{ $option->option_text }}
                </label>
            @endforeach

            <div class="nav-buttons">
                @if($order > 1)
                    <a href="{{ route('assessment.question', ['session' => $session->session_id, 'order' => $order - 1]) }}" class="btn-nav">
                        ← Sebelumnya
                    </a>
                @else
                    <div></div> <!-- Empty div to push next button to right -->
                @endif
                
                <button type="submit" class="btn-nav btn-next">
                    {{ $order == $totalQuestions ? 'Selesai & Review' : 'Pertanyaan Berikutnya →' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
