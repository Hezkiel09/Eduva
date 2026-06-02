@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}">
@endpush

@section('content')
<div class="result-container">
    
    <!-- Header Result -->
    <div class="result-header">
        <h2>Hasil Assessment Kamu</h2>
        <p>Berdasarkan jawabanmu, ini adalah jalur karir yang paling cocok untukmu:</p>
        
        <div class="result-track-highlight">
            <h1>{{ $result->careerTrack->title }}</h1>
            <p>Tingkat Kesiapan: {{ ucfirst($result->readiness_level) }}</p>
        </div>
        
        <p class="result-desc">{{ $result->careerTrack->description }}</p>
    </div>

    <!-- Skor Detail -->
    <div class="result-details-grid">
        <!-- Kiri: Breakdown Skor -->
        <div class="result-panel">
            <h3>Rincian Skor Per Bidang</h3>
            <ul class="score-list">
                @foreach($trackScores as $track => $score)
                <li class="score-item">
                    <div class="score-label">
                        <span>{{ strtoupper($track) }}</span>
                        <span>{{ $trackPercentages[$track] }}%</span>
                    </div>
                    <div class="score-bar-bg">
                        <div class="score-bar-fill" style="width: {{ $trackPercentages[$track] }}%;"></div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Kanan: Rekomendasi Bootcamp -->
        <div class="result-panel">
            <h3>Rekomendasi Pembelajaran</h3>
            @if($result->careerTrack->bootcamps->count() > 0)
                <ul class="bootcamp-list">
                    @foreach($result->careerTrack->bootcamps as $bootcamp)
                    <li class="bootcamp-item">
                        <strong>{{ $bootcamp->name }}</strong><br>
                        <a href="{{ $bootcamp->url }}" target="_blank" class="bootcamp-link">Lihat Program ↗</a>
                    </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada rekomendasi course untuk track ini.</p>
            @endif
        </div>
    </div>

    <!-- Analisis Kesenjangan & Rekomendasi Kompetensi -->
    <div class="gap-analysis-panel">
        <h3>Rekomendasi Pengembangan Kompetensi</h3>
        <p>Berdasarkan hasil assessment Anda, berikut adalah area kompetensi yang disarankan untuk dikembangkan (Skill Gaps):</p>
        
        @if($result->skillGaps && $result->skillGaps->count() > 0)
            <div class="gap-grid">
                @foreach($result->skillGaps as $gap)
                    <div class="gap-card {{ $gap->gap_level }}">
                        <h4>{{ $gap->skill_name }}</h4>
                        <span class="gap-badge {{ $gap->gap_level }}">
                            Prioritas: {{ ucfirst($gap->gap_level) }}
                        </span>
                        <p class="gap-desc">
                            @if($gap->gap_level == 'high')
                                Sangat disarankan untuk segera mempelajari dasar-dasar pada bidang ini untuk mendukung karir utama Anda.
                            @elseif($gap->gap_level == 'medium')
                                Pelajari lebih lanjut bidang ini untuk meningkatkan daya saing Anda.
                            @else
                                Pertahankan pengetahuan Anda, cukup perdalam sesuai kebutuhan proyek.
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color: #6B7280; font-style: italic;">Tidak ada gap kompetensi yang signifikan. Anda siap berkarir!</p>
        @endif
    </div>
    
    <div class="result-action">
        <a href="{{ route('learning-path') }}" class="btn-black">
            Lihat Learning Path
        </a>
    </div>

</div>
@endsection
