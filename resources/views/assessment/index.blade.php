@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}">
@endpush

@section('content')
<div class="assessment-banner">
    <h1>Temukan Potensi Teknologi Kamu</h1>
    <p>Kenali kemampuan teknis kamu melalui tes yang dirancang khusus untuk mencocokkan minatmu dengan kebutuhan industri saat ini.</p>
</div>

<div class="assessment-cards-wrapper">
    <div class="assessment-card-info">
        <h3>Tes Logika</h3>
        <p>Ukur kemampuan berpikir sistematis dan analitis kamu.</p>
    </div>
    <div class="assessment-card-info">
        <h3>Tes Kemampuan Teknologi</h3>
        <p>Uji pemahamanmu di berbagai bahasa dan teknologi pemrograman.</p>
    </div>
</div>

<div class="assessment-card-info assessment-card-flex">
    <div>
        <h3>Minat & Karir</h3>
        <p>Temukan jalur karir yang paling sesuai dengan kepribadian dan minatmu.</p>
    </div>
    
    @if($activeSession)
        <a href="{{ route('assessment.question', ['session' => $activeSession->session_id, 'order' => 1]) }}" class="assessment-btn-start">Lanjutkan Sesi Aktif</a>
    @else
        <form action="{{ route('assessment.start') }}" method="POST">
            @csrf
            <button type="submit" class="assessment-btn-start">Mulai Sekarang</button>
        </form>
    @endif
</div>

<div class="assessment-sample-container">
    <h3>Contoh Soal</h3>
    <p><strong>Properti CSS apa yang digunakan untuk membuat flexbox container?</strong></p>
    <ul class="assessment-sample-list">
        <li>A. display: flex;</li>
        <li>B. flex-direction: row;</li>
    </ul>
</div>

@endsection
