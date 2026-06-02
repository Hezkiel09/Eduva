@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}">
@endpush
@section('content')

<div class="layout-split">
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
            <li>🏠 Beranda</li>
            <li style="color: #2563EB; font-weight:bold;">📝 Asesmen</li>
            <li>🎯 Karir yang Cocok</li>
            <li>📚 Jalur Belajar</li>
        </ul>
    </div>

    <div class="main-content">
        <div style="font-size: 12px; font-weight: bold; background: #000; color: white; display: inline-block; padding: 4px 8px; border-radius: 4px; margin-bottom: 10px;">
            Pertanyaan {{ $order }} dari {{ $totalQuestions }}
        </div>
        
        <h2 style="margin-top: 0;">{{ $question->question_text }}</h2>

        <form action="{{ route('assessment.answer', $session->session_id) }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->question_id }}">
            <input type="hidden" name="order" value="{{ $order }}">

            <div class="option-cards-container" style="margin-bottom: 28px;">
                @foreach($question->options as $option)
                    <label class="option-card">
                        <input type="radio" name="option_id" value="{{ $option->option_id }}" required 
                            {{ ($existingAnswer && $existingAnswer->option_id == $option->option_id) ? 'checked' : '' }}
                        > 
                        {{ $option->option_text }}
                    </label>
                @endforeach
            </div>

            <div class="nav-buttons">
                @if($order > 1)
                    <a href="{{ route('assessment.question', ['session' => $session->session_id, 'order' => $order - 1]) }}" class="btn-nav">
                        ← Sebelumnya
                    </a>
                @else
                    <div></div>
                @endif
                
                <button type="submit" class="btn-nav btn-next">
                    {{ $order == $totalQuestions ? 'Selesai & Review' : 'Pertanyaan Berikutnya →' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
