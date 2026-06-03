@extends('layouts.app')

@section('title', 'Profil Saya - Eduva')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="page-container" style="padding-top: 40px; padding-bottom: 60px;">
    @if(session('success'))
        <div class="alert alert-success">
            <div class="alert-icon">
                <svg viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="alert-content">
                {{ session('success') }}
            </div>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="alert-icon">
                <svg viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="alert-content">
                <ul style="margin: 0; padding-left: 15px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    @endif

    <div class="profile-header-card">
        <div class="profile-cover"></div>
        <div class="profile-avatar-container">
            <div class="profile-avatar-wrapper">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" id="profile-avatar-preview">
            </div>
            <div class="profile-info-block">
                <div class="profile-name-row">
                    <h1 class="profile-fullname">{{ $user->username }}</h1>
                    <span class="badge badge-role">{{ $user->role === 'admin' ? 'Admin' : 'Siswa' }}</span>
                </div>
                @if($user->headline)
                    <p class="profile-headline">{{ $user->headline }}</p>
                @endif
                <div class="profile-meta-row">
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                        {{ $user->institution ?? 'Belum mengisi institusi' }}
                    </span>
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        {{ $user->age ?? '—' }} Tahun
                    </span>
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        {{ $user->email ?? 'Belum ada email' }}
                    </span>
                </div>
                <p class="profile-bio-text">{{ $user->bio ?? 'Belum menuliskan bio. Tuliskan sesuatu tentang diri Anda agar profil terlihat lebih menarik!' }}</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn-edit-profile" style="text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4z"></path></svg>
                Edit Profil
            </a>
        </div>
    </div>

    <div class="profile-stats-grid profile-stats-grid-2col">
        <div class="stat-card">
            <div class="stat-icon-wrapper blue">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <div class="stat-info">
                <h3>{{ $totalAssessments }}</h3>
                <p>Total Asesmen</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon-wrapper purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <div class="stat-info">
                <h3>{{ $compScore }}%</h3>
                <p>Skor Kompetensi</p>
            </div>
        </div>
    </div>

    <div class="profile-details-layout">
        <div class="details-card-panel">
            <div class="panel-header">
                <h2>Kompetensi Utama</h2>
                <span class="panel-subtitle">Berdasarkan rata-rata seluruh pengukuran asesmen Anda</span>
            </div>
            <div class="competency-list">
                <div class="competency-item">
                    <div class="competency-info">
                        <span class="competency-label">Frontend Development</span>
                        <span class="competency-val">{{ $competencies['frontend'] }}%</span>
                    </div>
                    <div class="competency-bar-bg">
                        <div class="competency-bar-fill frontend" style="width: {{ $competencies['frontend'] }}%"></div>
                    </div>
                </div>
                <div class="competency-item">
                    <div class="competency-info">
                        <span class="competency-label">UI/UX Design & Prototyping</span>
                        <span class="competency-val">{{ $competencies['uiux'] }}%</span>
                    </div>
                    <div class="competency-bar-bg">
                        <div class="competency-bar-fill uiux" style="width: {{ $competencies['uiux'] }}%"></div>
                    </div>
                </div>
                <div class="competency-item">
                    <div class="competency-info">
                        <span class="competency-label">Backend Architecture</span>
                        <span class="competency-val">{{ $competencies['backend'] }}%</span>
                    </div>
                    <div class="competency-bar-bg">
                        <div class="competency-bar-fill backend" style="width: {{ $competencies['backend'] }}%"></div>
                    </div>
                </div>
                <div class="competency-item">
                    <div class="competency-info">
                        <span class="competency-label">Problem Solving & Logic</span>
                        <span class="competency-val">{{ $competencies['problem_solving'] }}%</span>
                    </div>
                    <div class="competency-bar-bg">
                        <div class="competency-bar-fill problem-solving" style="width: {{ $competencies['problem_solving'] }}%"></div>
                    </div>
                </div>
                <div class="competency-item">
                    <div class="competency-info">
                        <span class="competency-label">Version Control (Git)</span>
                        <span class="competency-val">{{ $competencies['git'] }}%</span>
                    </div>
                    <div class="competency-bar-bg">
                        <div class="competency-bar-fill git" style="width: {{ $competencies['git'] }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="details-sidebar-panel">
            <div class="details-card-panel" style="margin-bottom: 24px;">
                <div class="panel-header">
                    <h2>Minat & Wawasan Karir</h2>
                </div>
                <div class="interest-tags">
                    @forelse($interestTags as $tag)
                        <span class="tag tag-interest">{{ $tag }}</span>
                    @empty
                        <span class="tag tag-interest">Frontend Dev</span>
                        <span class="tag tag-interest">Fullstack Engineering</span>
                        <span class="tag tag-interest">UI/UX Research</span>
                        <span class="tag tag-interest">Product Design</span>
                    @endforelse
                </div>
                
                @if(isset($insightTrend))
                    <div class="insight-block" style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #F1F5F9;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-size: 11.5px; font-weight: 700; text-transform: uppercase; color: #2563EB; letter-spacing: 0.5px;">Wawasan Karir</span>
                            <span class="badge" style="background: #FEF3C7; color: #92400E; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 99px; text-transform: uppercase;">{{ $insightTrend->demand_level }} Demand</span>
                        </div>
                        <h4 style="font-size: 13.5px; font-weight: 800; color: #0F172A; margin: 0 0 4px 0;">Skill Populer: {{ $insightTrend->skill_name }}</h4>
                        <p style="font-size: 12.5px; color: #475569; line-height: 1.5; margin: 0;">{{ $insightTrend->description }}</p>
                    </div>
                @endif
            </div>

            <div class="details-card-panel">
                <div class="panel-header">
                    <h2>Langkah Selanjutnya</h2>
                </div>
                <div class="next-steps-list">
                    @foreach($recommendedSteps as $step)
                        <label class="step-checkbox-item">
                            @if($step['auto'])
                                <input type="checkbox" {{ $step['done'] ? 'checked' : '' }} disabled>
                                <span class="checkmark-box"></span>
                                <span class="step-text {{ $step['done'] ? 'done' : '' }}">
                                    @if(!$step['done'])
                                        <a href="{{ $step['action_url'] }}" style="color: #2563EB; font-weight: 600; text-decoration: none; border-bottom: 1px dashed #2563EB;">{{ $step['text'] }}</a>
                                    @else
                                        {{ $step['text'] }}
                                    @endif
                                </span>
                            @else
                                <input type="checkbox" id="{{ $step['id'] }}" onchange="updateStepState(this)">
                                <span class="checkmark-box"></span>
                                <span class="step-text">
                                    <a href="{{ $step['action_url'] }}" style="color: inherit; text-decoration: none; font-weight: 500;">{{ $step['text'] }}</a>
                                </span>
                            @endif
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="details-card-panel" style="margin-top: 30px; margin-bottom: 40px;">
        <div class="panel-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <div>
                <h2>Riwayat Asesmen</h2>
                <span class="panel-subtitle">Daftar ujian dan pengukuran kompetensi yang telah Anda lalui</span>
            </div>
            <a href="{{ route('assessment.index') }}" class="btn-view-roadmap" style="background: #2563EB; color: white !important; padding: 10px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Asesmen Baru
            </a>
        </div>
        
        @if($assessmentHistory->isEmpty())
            <div class="empty-history" style="text-align: center; padding: 48px 20px; background: #F8FAFC; border-radius: 20px; border: 2px dashed #E2E8F0; margin-top: 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 12px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <p style="color: #64748B; font-size: 15px; margin: 0 0 16px 0; font-weight: 500;">Anda belum pernah mengikuti asesmen kompetensi.</p>
                <a href="{{ route('assessment.index') }}" class="btn-view-roadmap" style="background: #000; color: white !important; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-size: 13.5px;">Mulai Asesmen Perdana &rarr;</a>
            </div>
        @else
            <div class="history-table-container" style="overflow-x: auto; margin-top: 15px; border-radius: 12px; border: 1px solid #E2E8F0;">
                <table class="history-table" style="width: 100%; border-collapse: collapse; text-align: left; min-width: 600px;">
                    <thead>
                        <tr style="background: #F8FAFC; border-bottom: 2px solid #E2E8F0; color: #475569; font-size: 12.5px; font-weight: 700;">
                            <th style="padding: 14px 20px; text-transform: uppercase; letter-spacing: 0.5px;">Tanggal Pengujian</th>
                            <th style="padding: 14px 20px; text-transform: uppercase; letter-spacing: 0.5px;">Minat Karir Utama</th>
                            <th style="padding: 14px 20px; text-transform: uppercase; letter-spacing: 0.5px;">Tingkat Kesiapan</th>
                            <th style="padding: 14px 20px; text-transform: uppercase; letter-spacing: 0.5px;">Skor Tertinggi</th>
                            <th style="padding: 14px 20px; text-transform: uppercase; letter-spacing: 0.5px; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assessmentHistory as $history)
                            <tr class="history-row" style="border-bottom: 1px solid #E2E8F0; font-size: 14px; color: #334155; transition: background 0.2s;">
                                <td style="padding: 16px 20px; font-weight: 500;">
                                    {{ $history->submitted_at ? $history->submitted_at->timezone('Asia/Jakarta')->format('d M Y, H:i') : 'N/A' }} WIB
                                </td>
                                <td style="padding: 16px 20px;">
                                    <span class="badge" style="background: #EFF6FF; color: #2563EB; font-weight: 700; padding: 4px 10px; border-radius: 8px; font-size: 12.5px;">
                                        {{ $history->careerTrack->title ?? 'N/A' }}
                                    </span>
                                </td>
                                <td style="padding: 16px 20px;">
                                    @if($history->readiness_level === 'advanced')
                                        <span class="badge" style="background: #ECFDF5; color: #059669; font-weight: 700; padding: 4px 10px; border-radius: 8px; font-size: 12.5px; text-transform: uppercase;">
                                            Advanced
                                        </span>
                                    @elseif($history->readiness_level === 'intermediate')
                                        <span class="badge" style="background: #FFFBEB; color: #D97706; font-weight: 700; padding: 4px 10px; border-radius: 8px; font-size: 12.5px; text-transform: uppercase;">
                                            Intermediate
                                        </span>
                                    @else
                                        <span class="badge" style="background: #FEF2F2; color: #DC2626; font-weight: 700; padding: 4px 10px; border-radius: 8px; font-size: 12.5px; text-transform: uppercase;">
                                            Beginner
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 16px 20px; font-weight: 800; color: #0F172A;">
                                    {{ max($history->track_scores) }} poin
                                </td>
                                <td style="padding: 16px 20px; text-align: right;">
                                    <a href="{{ route('result.show', ['result' => $history->result_id]) }}" class="btn-view-roadmap" style="font-weight: 700; text-decoration: none; font-size: 13.5px; display: inline-flex; align-items: center; gap: 4px;">
                                        Detail Hasil
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div class="top-career-section">
        <div class="top-career-header">
            <h2>Kecocokan Karir Teratas</h2>
            <p>Jalur karir yang paling selaras dengan kemampuan unik Anda</p>
        </div>
        <div class="career-matches-grid">
            @foreach($topMatches as $match)
                <div class="career-match-card">
                    <div class="career-card-header">
                        <div class="career-avatar">
                            <img src="{{ asset($match['image']) }}" alt="{{ $match['title'] }}" onerror="this.src='https://ui-avatars.com/api/?name='+encodeURIComponent('{{ $match['title'] }}')+'&background=EFF6FF&color=2563EB&size=64'">
                        </div>
                        <div class="circular-progress-wrapper">
                            <svg class="circular-progress" viewBox="0 0 36 36">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="circle" stroke-dasharray="{{ $match['percentage'] }}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <text x="18" y="20.35" class="percentage">{{ $match['percentage'] }}%</text>
                            </svg>
                        </div>
                    </div>
                    <div class="career-card-body">
                        <h3 class="career-role-title">{{ $match['title'] }}</h3>
                        <p class="career-role-desc">{{ $match['desc'] }}</p>
                        <div class="career-skills-tags">
                            @foreach($match['skills'] as $skill)
                                <span class="skill-tag">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="career-card-footer">
                        <a href="{{ route('learning-path') }}" class="btn-view-roadmap">Lihat Peta Jalan Peran &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const steps = ['step-lp'];
        steps.forEach(stepId => {
            const isChecked = localStorage.getItem(stepId) === 'true';
            const checkbox = document.getElementById(stepId);
            if (checkbox) {
                checkbox.checked = isChecked;
                if (isChecked) {
                    checkbox.parentElement.querySelector('.step-text').classList.add('done');
                }
            }
        });
    });

    function updateStepState(checkbox) {
        const stepId = checkbox.id;
        const textElement = checkbox.parentElement.querySelector('.step-text');
        if (checkbox.checked) {
            textElement.classList.add('done');
            localStorage.setItem(stepId, 'true');
        } else {
            textElement.classList.remove('done');
            localStorage.setItem(stepId, 'false');
        }
    }
</script>
@endsection
