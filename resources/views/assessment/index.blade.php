@extends('layouts.app')

@section('title', 'Asesmen Kompetensi - Eduva')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="page-container" style="padding-top: 40px; padding-bottom: 60px;">

    <div class="assessment-hero-container">
        <div class="assessment-hero-text">
            <h1>Temukan <span style="position: relative; display: inline-block;">Potensi<span style="position: absolute; left: 0; bottom: -4px; width: 100%; height: 5px; background: #FACC15; border-radius: 99px;"></span></span> Teknologi Anda</h1>
            <p>Kenali kecocokan karir, ukur keahlian teknis, dan rancang peta belajar mandiri kamu melalui asesmen standar industri digital dari Eduva.</p>
            <div class="assessment-hero-buttons">
                <button type="button" class="btn-hero-solid" onclick="openConfirmModal()">Mulai Asesmen</button>
                <a href="{{ route('learning-path') }}" class="btn-hero-outline">Jelajahi Jalur Belajar</a>
            </div>
        </div>

        <div class="assessment-hero-graphic-wrapper">
            <img src="{{ asset('img/assessment/Assessment-Center-Online-Bisa-dari-Seluruh-Indonesia.jpg') }}" alt="Eduva Assessment" class="assessment-hero-illustration">
            
            <div class="floating-badge skill-score">
                <div class="floating-badge-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <div class="floating-badge-text">
                    <p class="floating-badge-title">Skor Keahlian</p>
                    <p class="floating-badge-val">892 Poin</p>
                </div>
            </div>

            <div class="floating-badge career-match">
                <div class="floating-badge-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div class="floating-badge-text">
                    <p class="floating-badge-title">Kecocokan Karir</p>
                    <p class="floating-badge-val">85% Match</p>
                </div>
            </div>
        </div>
    </div>

    <div class="level-up-card">
        <h2>Siap meningkatkan kemampuanmu?</h2>
        <p>Asesmen terstruktur kami mengukur logika komputasional, penalaran analitik, serta pemahaman arsitektur sistem untuk memetakan spesialisasi karir digital terbaik Anda.</p>
        <button type="button" class="btn-begin-large" onclick="openConfirmModal()">Mulai Assessment Sekarang</button>
    </div>

    <div style="max-width: 720px; margin: 0 auto 30px auto; text-align: left;">
        <div class="main-content" style="border-top: 5px solid #06B6D4; border-radius: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <span style="font-size: 13.5px; font-weight: 700; color: #2563EB;">Pertanyaan 3 dari 10</span>
                <span class="quiz-difficulty-badge" style="margin: 0;">Tingkat Kesulitan Sedang</span>
            </div>

            <h3 class="quiz-question-title" style="margin-top: 0; font-size: 18px;">Manakah dari struktur data berikut yang bekerja berdasarkan prinsip Last-In, First-Out (LIFO)?</h3>

            <div class="option-cards-container" style="pointer-events: none;">
                <div class="option-card">
                    <div class="option-card-circle">A</div>
                    <span style="font-size: 14.5px; font-weight: 600; color: #334155;">Queue (Antrean)</span>
                </div>
                <div class="option-card" style="border-color: #2563EB; background-color: #EFF6FF;">
                    <div class="option-card-circle" style="background-color: #2563EB; border-color: #2563EB; color: #ffffff;">B</div>
                    <span style="font-size: 14.5px; font-weight: 700; color: #0F172A;">Stack (Tumpukan)</span>
                </div>
                <div class="option-card">
                    <div class="option-card-circle">C</div>
                    <span style="font-size: 14.5px; font-weight: 600; color: #334155;">Linked List (Daftar Berantai)</span>
                </div>
                <div class="option-card">
                    <div class="option-card-circle">D</div>
                    <span style="font-size: 14.5px; font-weight: 600; color: #334155;">Binary Search Tree (Pohon Pencarian Biner)</span>
                </div>
            </div>

            <div class="nav-buttons" style="margin-top: 28px; padding-top: 20px;">
                <span class="btn-nav" style="opacity: 0.6; cursor: not-allowed;">&larr; Sebelumnya</span>
                <button type="button" class="btn-hero-solid" style="padding: 10px 20px; font-size: 13.5px; display: inline-flex; align-items: center; gap: 6px;" onclick="openConfirmModal()">
                    Mulai Asesmen
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

</div>

<form action="{{ route('assessment.start') }}" method="POST" id="start-assessment-form" style="display: none;">
    @csrf
</form>

<div class="modal-overlay" id="confirmModalOverlay">
    <div class="modal-card">
        <div class="modal-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        </div>
        
        @if($activeSession)
            <h3>Sesi Asesmen Sedang Berjalan!</h3>
            <p>Kamu terdeteksi memiliki sesi asesmen aktif yang belum diselesaikan. Apakah kamu ingin melanjutkan sesi yang ada atau memulai ulang sesi baru?</p>
            <div class="modal-buttons" style="flex-direction: column; gap: 10px;">
                <a href="{{ route('assessment.question', ['session' => $activeSession->session_id, 'order' => 1]) }}" class="btn-modal-confirm" style="text-align: center; text-decoration: none; padding: 12px; font-weight: 700;">Lanjutkan Sesi Aktif</a>
                <button type="button" class="btn-modal-confirm" style="background: #EF4444; font-weight: 700;" onclick="submitNewSession()">Mulai Sesi Baru (Reset)</button>
                <button type="button" class="btn-modal-cancel" style="padding: 12px;" onclick="closeConfirmModal()">Batal</button>
            </div>
        @else
            <h3>Mulai Asesmen Baru?</h3>
            <p>Asesmen ini terdiri dari serangkaian pertanyaan teknologi untuk memetakan kompetensi profesional kamu. Apakah kamu siap untuk memulainya sekarang?</p>
            <div class="modal-buttons">
                <button type="button" class="btn-modal-cancel" onclick="closeConfirmModal()">Kembali</button>
                <button type="button" class="btn-modal-confirm" onclick="submitNewSession()">Mulai Asesmen</button>
            </div>
        @endif
    </div>
</div>

<script>
    function openConfirmModal() {
        document.getElementById('confirmModalOverlay').classList.add('active');
    }

    function closeConfirmModal() {
        document.getElementById('confirmModalOverlay').classList.remove('active');
    }

    function submitNewSession() {
        document.getElementById('start-assessment-form').submit();
    }

    document.getElementById('confirmModalOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeConfirmModal();
        }
    });
</script>
@endsection
