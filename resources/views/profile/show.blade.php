@extends('layouts.app')

@section('title', 'Profil Saya - Eduva')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/assessment.css') }}">
@endpush

@section('content')
<div class="page-container" style="padding-top: 40px; padding-bottom: 60px;">
    <!-- Alert Success -->
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

    <!-- Alert Error Validation -->
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

    <!-- Profile Header Card -->
    <div class="profile-header-card">
        <div class="profile-cover"></div>
        <div class="profile-avatar-container">
            <div class="profile-avatar-wrapper">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" id="profile-avatar-preview">
                <div class="profile-avatar-overlay" onclick="document.getElementById('avatar-file-input').click()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="camera-icon">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                </div>
            </div>
            <div class="profile-info-block">
                <div class="profile-name-row">
                    <h1 class="profile-fullname">{{ $user->username }}</h1>
                    <span class="badge badge-role">{{ ucfirst($user->role) }}</span>
                </div>
                <p class="profile-headline">{{ $user->headline ?? 'Aspiring Tech Professional' }}</p>
                <div class="profile-meta-row">
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                        {{ $user->institution ?? 'University of Technology' }}
                    </span>
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        {{ $user->age ?? '22' }} Tahun
                    </span>
                    <span class="profile-meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        {{ $user->email ?? 'Belum ada email' }}
                    </span>
                </div>
                <p class="profile-bio-text">{{ $user->bio ?? 'Belum menuliskan bio. Tuliskan sesuatu tentang diri Anda agar profil terlihat lebih menarik!' }}</p>
            </div>
            <button class="btn-edit-profile" onclick="openEditModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4z"></path></svg>
                Edit Profil
            </button>
        </div>
    </div>

    <!-- Stats Grid Row -->
    <div class="profile-stats-grid">
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
        <div class="stat-card">
            <div class="stat-icon-wrapper green">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
            <div class="stat-info">
                <h3>12</h3>
                <p>Proyek Selesai</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon-wrapper orange">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
            </div>
            <div class="stat-info">
                <h3>4</h3>
                <p>Sertifikasi</p>
            </div>
        </div>
    </div>

    <!-- Two-Column Details Section -->
    <div class="profile-details-layout">
        <!-- Left: Key Competencies -->
        <div class="details-card-panel">
            <div class="panel-header">
                <h2>Key Competencies</h2>
                <span class="panel-subtitle">Berdasarkan data asesmen riil Anda</span>
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

        <!-- Right: Career Interests & Next Steps -->
        <div class="details-sidebar-panel">
            <div class="details-card-panel" style="margin-bottom: 24px;">
                <div class="panel-header">
                    <h2>Career Interests</h2>
                </div>
                <div class="interest-tags">
                    <span class="tag tag-interest">Frontend Dev</span>
                    <span class="tag tag-interest">Fullstack Engineering</span>
                    <span class="tag tag-interest">UI/UX Research</span>
                    <span class="tag tag-interest">Product Design</span>
                    <span class="tag tag-interest">Data Analytics</span>
                </div>
            </div>

            <div class="details-card-panel">
                <div class="panel-header">
                    <h2>Recommended Next Steps</h2>
                </div>
                <div class="next-steps-list">
                    <label class="step-checkbox-item">
                        <input type="checkbox" checked disabled>
                        <span class="checkmark-box"></span>
                        <span class="step-text done">Ikuti asesmen perdana untuk petakan skill</span>
                    </label>
                    <label class="step-checkbox-item">
                        <input type="checkbox" id="step-lp" onchange="updateStepState(this)">
                        <span class="checkmark-box"></span>
                        <span class="step-text">Buka modul rekomendasi Learning Path</span>
                    </label>
                    <label class="step-checkbox-item">
                        <input type="checkbox" id="step-avatar" onchange="updateStepState(this)">
                        <span class="checkmark-box"></span>
                        <span class="step-text">Unggah foto profil personal Anda</span>
                    </label>
                    <label class="step-checkbox-item">
                        <input type="checkbox" id="step-bootcamp" onchange="updateStepState(this)">
                        <span class="checkmark-box"></span>
                        <span class="step-text">Daftar di salah satu Bootcamp mitra</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Career Matches -->
    <div class="top-career-section">
        <div class="top-career-header">
            <h2>Top Career Matches</h2>
            <p>Jalur karir yang paling selaras dengan kemampuan unik Anda</p>
        </div>
        <div class="career-matches-grid">
            @foreach($topMatches as $match)
                <div class="career-match-card">
                    <div class="career-card-header">
                        <div class="career-avatar">
                            <img src="{{ asset($match['image']) }}" alt="{{ $match['title'] }}" onerror="this.src='https://ui-avatars.com/api/?name='+encodeURIComponent('{{ $match['title'] }}')+'&background=EFF6FF&color=2563EB&size=64'">
                        </div>
                        <!-- Circular progress -->
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
                        <a href="{{ route('learning-path') }}" class="btn-view-roadmap">View Role Roadmap &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal-overlay" id="edit-profile-modal">
    <div class="modal-card">
        <div class="modal-header">
            <h2>Edit Profil</h2>
            <button class="modal-close-btn" onclick="closeEditModal()">&times;</button>
        </div>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Hidden input for file upload to trigger from avatar wrapper -->
            <input type="file" name="avatar" id="avatar-file-input" style="display: none;" accept="image/png, image/jpeg, image/jpg" onchange="previewAvatar(this)">

            <div class="modal-body">
                <div class="form-group-avatar">
                    <div class="modal-avatar-preview-wrapper" onclick="document.getElementById('avatar-file-input').click()">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" id="modal-avatar-preview-img">
                        <div class="edit-overlay-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <span>Ganti Foto</span>
                        </div>
                    </div>
                    <p class="form-help-text">Format file JPG atau PNG, Max 2MB.</p>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required placeholder="Contoh: joko_s">
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Contoh: joko@company.com">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="headline">Headline Profesional</label>
                        <input type="text" name="headline" id="headline" value="{{ old('headline', $user->headline) }}" placeholder="Contoh: Aspiring Frontend Engineer">
                    </div>
                    <div class="form-group">
                        <label for="institution">Institusi / Sekolah</label>
                        <input type="text" name="institution" id="institution" value="{{ old('institution', $user->institution) }}" placeholder="Contoh: Telkom University">
                    </div>
                </div>

                <div class="form-group">
                    <label for="age">Umur</label>
                    <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}" min="1" max="120" placeholder="Contoh: 22">
                </div>

                <div class="form-group">
                    <label for="bio">Biografi Singkat</label>
                    <textarea name="bio" id="bio" rows="4" placeholder="Tuliskan latar belakang, minat, atau target karir Anda...">{{ old('bio', $user->bio) }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="btn-save">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open Modal
    function openEditModal() {
        const modal = document.getElementById('edit-profile-modal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close Modal
    function closeEditModal() {
        const modal = document.getElementById('edit-profile-modal');
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Image Preview function
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('modal-avatar-preview-img').src = e.target.result;
                document.getElementById('profile-avatar-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Keep state of Recommended Next Steps checkboxes in LocalStorage
    document.addEventListener('DOMContentLoaded', () => {
        const steps = ['step-lp', 'step-avatar', 'step-bootcamp'];
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

    // Close modal if user clicks outside of modal card
    window.onclick = function(event) {
        const modal = document.getElementById('edit-profile-modal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
</script>
@endsection
