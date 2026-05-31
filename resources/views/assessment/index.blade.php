@extends('layouts.app')

@section('content')
<style>
    .banner {
        background-color: #1E3A8A;
        color: white;
        padding: 40px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .cards-wrapper {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }
    .card-info {
        background: white;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
        flex: 1;
    }
    .btn-start {
        background-color: #000;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }
    .sample-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
</style>

<div class="banner">
    <h1 style="margin-top:0;">Discover Your Tech Potential</h1>
    <p>Unlock your vocational future with data-driven skill assessments designed to align your technical prowess with industry demands.</p>
</div>

<div class="cards-wrapper">
    <div class="card-info">
        <h3>Logic Test</h3>
        <p>Evaluate your algorithmic thinking.</p>
    </div>
    <div class="card-info">
        <h3>Tech Stack Assessment</h3>
        <p>Deep dive into specific languages.</p>
    </div>
</div>

<div class="card-info" style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h3>Interests & Career (Tugas Utama)</h3>
        <p>Map your personality to find your perfect vocational trajectory.</p>
    </div>
    
    @if($activeSession)
        <a href="{{ route('assessment.question', ['session' => $activeSession->session_id, 'order' => 1]) }}" class="btn-start" style="text-decoration: none;">Lanjutkan Sesi Aktif</a>
    @else
        <form action="{{ route('assessment.start') }}" method="POST">
            @csrf
            <button type="submit" class="btn-start">Begin Mapping</button>
        </form>
    @endif
</div>

<div class="sample-container">
    <h3>Sample Question</h3>
    <p><strong>Which CSS property is used to create a flexbox container?</strong></p>
    <ul style="list-style-type: none; padding: 0;">
        <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; border-radius: 4px;">A. display: flex;</li>
        <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; border-radius: 4px;">B. flex-direction: row;</li>
    </ul>
</div>

@endsection
