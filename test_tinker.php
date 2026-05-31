<?php

echo "=== 1. DATA USER ===\n";
$userCount = App\Models\User::count();
$admin = App\Models\User::where('role', 'admin')->first();
echo "Total User: {$userCount}\n";
echo "Admin Email: {$admin->email} | Role: {$admin->role}\n\n";

echo "=== 2. CAREER TRACK & BOOTCAMP ===\n";
$trackCount = App\Models\CareerTrack::count();
$bootcampCount = App\Models\Bootcamp::count();
echo "Total Career Tracks: {$trackCount}\n";
echo "Total Bootcamps: {$bootcampCount}\n";

$sampleTrack = App\Models\CareerTrack::with('bootcamps')->first();
echo "Contoh Track: {$sampleTrack->title}\n";
echo "Jumlah Roadmap Phase: " . count($sampleTrack->roadmap['phases']) . "\n";
echo "Jumlah Bootcamp di {$sampleTrack->title}: {$sampleTrack->bootcamps->count()}\n\n";

echo "=== 3. ASSESSMENT & PERTANYAAN ===\n";
$assessment = App\Models\Assessment::first();
$questionCount = App\Models\Question::count();
echo "Judul Assessment: {$assessment->title}\n";
echo "Total Pertanyaan: {$questionCount}\n";

$sampleQuestion = App\Models\Question::with('options')->first();
echo "Contoh Soal (Q1): {$sampleQuestion->question_text}\n";
echo "Jumlah Opsi Q1: {$sampleQuestion->options->count()}\n";
echo "Skor Opsi 1: " . json_encode($sampleQuestion->options->first()->scores) . "\n\n";

echo "=== 4. TREN INDUSTRI ===\n";
$trendCount = App\Models\IndustryTrend::count();
$sampleTrend = App\Models\IndustryTrend::first();
echo "Total Tren: {$trendCount}\n";
echo "Contoh Tren: {$sampleTrend->skill_name} | Kategori: {$sampleTrend->category} | Demand: {$sampleTrend->demand_level}\n";

// Keluar dari tinker
exit;
