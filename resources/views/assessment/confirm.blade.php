@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 8px; border: 1px solid #ddd; text-align: center;">
    <h2>Konfirmasi Selesai Ujian</h2>
    
    <p style="margin-bottom: 20px;">
        Kamu telah menjawab <strong>{{ $answeredCount }}</strong> dari <strong>{{ $totalQuestions }}</strong> pertanyaan.
    </p>

    @if($answeredCount < $totalQuestions)
        <div style="background: #FEF3C7; color: #92400E; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            ⚠️ <strong>Perhatian:</strong> Masih ada pertanyaan yang belum dijawab. Skor mungkin tidak maksimal.
        </div>
    @else
        <div style="background: #D1FAE5; color: #065F46; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            ✅ Semua pertanyaan telah dijawab!
        </div>
    @endif

    <div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
        <a href="{{ route('assessment.question', ['session' => $session->session_id, 'order' => $totalQuestions]) }}" style="padding: 12px 24px; background: #E5E7EB; color: #374151; text-decoration: none; border-radius: 4px; font-weight: bold;">
            Cek Jawaban Kembali
        </a>
        
        <form action="{{ route('assessment.finish', $session->session_id) }}" method="POST">
            @csrf
            <button type="submit" style="padding: 12px 24px; background: #2563EB; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                Ya, Kumpulkan Jawaban
            </button>
        </form>
    </div>
</div>
@endsection
