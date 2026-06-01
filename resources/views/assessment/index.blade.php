@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}">
@endpush

@section('content')
<div class="assessment-banner">
    <h1>Discover Your Tech Potential</h1>
    <p>Unlock your vocational future with data-driven skill assessments designed to align your technical prowess with industry demands.</p>
</div>

<div class="assessment-cards-wrapper">
    <div class="assessment-card-info">
        <h3>Logic Test</h3>
        <p>Evaluate your algorithmic thinking.</p>
    </div>
    <div class="assessment-card-info">
        <h3>Tech Stack Assessment</h3>
        <p>Deep dive into specific languages.</p>
    </div>
</div>

<div class="assessment-card-info assessment-card-flex">
    <div>
        <h3>Interests & Career (Tugas Utama)</h3>
        <p>Map your personality to find your perfect vocational trajectory.</p>
    </div>
    
    @if($activeSession)
        <a href="{{ route('assessment.question', ['session' => $activeSession->session_id, 'order' => 1]) }}" class="assessment-btn-start">Lanjutkan Sesi Aktif</a>
    @else
        <form action="{{ route('assessment.start') }}" method="POST">
            @csrf
            <button type="submit" class="assessment-btn-start">Begin Mapping</button>
        </form>
    @endif
</div>

<div class="assessment-sample-container">
    <h3>Sample Question</h3>
    <p><strong>Which CSS property is used to create a flexbox container?</strong></p>
    <ul class="assessment-sample-list">
        <li>A. display: flex;</li>
        <li>B. flex-direction: row;</li>
    </ul>
</div>

@endsection
