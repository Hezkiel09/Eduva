@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 30px auto;">
    
    <!-- Header Result -->
    <div style="background: white; padding: 40px; border-radius: 8px; border: 1px solid #ddd; text-align: center; margin-bottom: 30px;">
        <h2 style="margin-top: 0; color: #1E3A8A;">Hasil Assessment Kamu</h2>
        <p>Berdasarkan jawabanmu, ini adalah jalur karir yang paling cocok untukmu:</p>
        
        <div style="display: inline-block; background: #EFF6FF; border: 2px solid #2563EB; padding: 20px 40px; border-radius: 8px; margin: 20px 0;">
            <h1 style="color: #2563EB; margin: 0; font-size: 32px;">{{ $result->careerTrack->title }}</h1>
            <p style="margin: 5px 0 0; color: #1E3A8A; font-weight: bold;">Level: {{ ucfirst($result->readiness_level) }}</p>
        </div>
        
        <p style="color: #4B5563; max-width: 600px; margin: 0 auto;">{{ $result->careerTrack->description }}</p>
    </div>

    <!-- Skor Detail -->
    <div style="display: flex; gap: 30px; align-items: flex-start;">
        <!-- Kiri: Breakdown Skor -->
        <div style="flex: 1; background: white; padding: 30px; border-radius: 8px; border: 1px solid #ddd;">
            <h3 style="margin-top: 0;">Rincian Skor Per Bidang</h3>
            <ul style="list-style: none; padding: 0;">
                @foreach($trackScores as $track => $score)
                <li style="margin-bottom: 15px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px; font-weight: bold; font-size: 14px;">
                        <span>{{ strtoupper($track) }}</span>
                        <span>{{ $trackPercentages[$track] }}%</span>
                    </div>
                    <div style="width: 100%; background: #E5E7EB; border-radius: 10px; height: 10px;">
                        <div style="background: #2563EB; width: {{ $trackPercentages[$track] }}%; height: 10px; border-radius: 10px;"></div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Kanan: Rekomendasi Bootcamp -->
        <div style="flex: 1; background: white; padding: 30px; border-radius: 8px; border: 1px solid #ddd;">
            <h3 style="margin-top: 0;">Rekomendasi Pembelajaran</h3>
            @if($result->careerTrack->bootcamps->count() > 0)
                <ul style="padding-left: 20px;">
                    @foreach($result->careerTrack->bootcamps as $bootcamp)
                    <li style="margin-bottom: 15px;">
                        <strong>{{ $bootcamp->name }}</strong><br>
                        <a href="{{ $bootcamp->url }}" target="_blank" style="color: #2563EB; font-size: 14px;">Buka Bootcamp ↗</a>
                    </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada rekomendasi course untuk track ini.</p>
            @endif
        </div>
    </div>
    
    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('dashboard') }}" style="padding: 12px 24px; background: #000; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
            Kembali ke Dashboard
        </a>
    </div>

</div>
@endsection
