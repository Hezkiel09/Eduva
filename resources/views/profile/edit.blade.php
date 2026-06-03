@extends('layouts.app')

@section('title', 'Edit Profil - Eduva')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ time() }}">
@endpush

@section('content')
<div class="page-container" style="padding-top: 40px; padding-bottom: 60px;">
    <div style="margin-bottom: 32px;">
        <h1 style="font-size: 28px; font-weight: 800; color: #0F172A; margin: 0 0 6px 0;">Edit Profil</h1>
        <p style="font-size: 14.5px; color: #64748B; margin: 0; line-height: 1.5;">Kelola informasi pribadi dan preferensi akademik Anda untuk mempersonalisasi perjalanan belajar Anda dengan Eduva.</p>
    </div>

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

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" name="avatar" id="avatar-file-input" style="display: none;" accept="image/png, image/jpeg, image/jpg" onchange="previewAvatar(this)">

        <div class="profile-details-layout">
            <div class="details-card-panel" style="display: flex; flex-direction: column; align-items: center; text-align: center; justify-content: space-between; min-height: 480px; padding: 36px 28px;">
                <div style="display: flex; flex-direction: column; align-items: center; width: 100%;">
                    <div class="edit-avatar-container-wrapper" onclick="document.getElementById('avatar-file-input').click()">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" id="edit-avatar-preview-img">
                        <div class="edit-avatar-small-overlay-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="edit-camera-badge-icon">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </div>
                    </div>

                    <h3 style="font-size: 16px; font-weight: 800; color: #0F172A; margin: 20px 0 6px 0;">Foto Profil</h3>
                    <p style="font-size: 12.5px; color: #64748B; line-height: 1.5; margin: 0 0 20px 0; max-width: 200px;">Format yang didukung: JPG, PNG. Ukuran maksimal file adalah 2MB.</p>
                    
                    <button type="button" class="btn-avatar-outline" onclick="document.getElementById('avatar-file-input').click()">Ganti Foto</button>
                </div>

                <div style="width: 100%; border-top: 1px solid #E2E8F0; padding-top: 20px; text-align: left; display: flex; flex-direction: column; gap: 12px; margin-top: 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 13.5px; color: #475569;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span style="font-weight: 500;">Profil Siswa Terverifikasi</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 13.5px; color: #475569;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span style="font-weight: 500;">Bergabung sejak {{ $user->created_at ? $user->created_at->timezone('Asia/Jakarta')->translatedFormat('F Y') : 'September 2023' }}</span>
                    </div>
                </div>
            </div>

            <div class="details-card-panel" style="padding: 36px 36px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div class="form-row-2col">
                        <div class="form-field-group">
                            <label for="username">Nama Lengkap</label>
                            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="form-field-group">
                            <label for="institution">Nama Institusi Pendidikan</label>
                            <div class="input-with-icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="input-prefix-icon">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                    <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"></path>
                                </svg>
                                <input type="text" name="institution" id="institution" value="{{ old('institution', $user->institution) }}" placeholder="Contoh: Universitas Indonesia" style="padding-left: 42px;">
                            </div>
                        </div>
                    </div>

                    <div class="form-row-2col" style="margin-top: 24px;">
                        <div class="form-field-group">
                            <label for="headline">Bidang Minat Akademik</label>
                            <div class="select-with-arrow-wrapper">
                                <select name="headline" id="headline">
                                    <option value="" disabled selected>Pilih bidang minat akademik</option>
                                    <option value="Ilmu Komputer" {{ old('headline', $user->headline) == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                                    <option value="Sains Data" {{ old('headline', $user->headline) == 'Sains Data' ? 'selected' : '' }}>Sains Data</option>
                                    <option value="Keamanan Siber" {{ old('headline', $user->headline) == 'Keamanan Siber' ? 'selected' : '' }}>Keamanan Siber</option>
                                    <option value="Sistem Informasi" {{ old('headline', $user->headline) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                    <option value="Desain UI/UX / Produk" {{ old('headline', $user->headline) == 'Desain UI/UX / Produk' ? 'selected' : '' }}>Desain UI/UX / Produk</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field-group">
                            <label for="age">Usia</label>
                            <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}" min="1" max="120" placeholder="Masukkan usia Anda">
                        </div>
                    </div>

                    <div class="form-field-group" style="margin-top: 24px;">
                        <label for="bio">Bio Singkat</label>
                        <textarea name="bio" id="bio" rows="5" placeholder="Tuliskan latar belakang singkat, minat belajar, atau target karir Anda..." maxlength="500" oninput="updateCharCount(this)">{{ old('bio', $user->bio) }}</textarea>
                        <span id="bio-char-counter" style="display: block; text-align: right; font-size: 11.5px; color: #94A3B8; margin-top: 6px;">{{ strlen(old('bio', $user->bio ?? '')) }} / 500 karakter</span>
                    </div>

                    <div class="form-field-group" style="margin-top: 24px;">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="joko@example.com">
                    </div>

                    <div style="margin-top: 32px; border-top: 1px solid #E2E8F0; padding-top: 24px;">
                        <h3 style="font-size: 16px; font-weight: 800; color: #0F172A; margin: 0 0 6px 0;">Ganti Password</h3>
                        <p style="font-size: 12.5px; color: #64748B; margin: 0 0 20px 0;">Kosongkan jika tidak ingin mengganti password.</p>
                        <div class="form-row-2col">
                            <div class="form-field-group">
                                <label for="password">Password Baru</label>
                                <input type="password" name="password" id="password" placeholder="Masukkan password baru">
                            </div>
                            <div class="form-field-group">
                                <label for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password baru">
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 28px;">
                        <label class="step-checkbox-item">
                            <input type="checkbox" id="public-profile" checked>
                            <span class="checkmark-box" style="border-radius: 4px;"></span>
                            <span style="font-size: 13.5px; font-weight: 600; color: #0F172A; line-height: 1.4;">Aktifkan Profil Publik</span>
                        </label>
                        <p style="font-size: 12.5px; color: #64748B; margin: 4px 0 0 32px; line-height: 1.5; max-width: 580px;">Izinkan siswa dan mentor lain untuk melihat portofolio dan bio Anda untuk kolaborasi yang lebih baik.</p>
                    </div>
                </div>

                <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid #E2E8F0; display: flex; justify-content: flex-end; gap: 14px;">
                    <a href="{{ route('profile.show') }}" class="btn-edit-profile-cancel">Batal</a>
                    <button type="submit" class="btn-edit-profile-save">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('edit-avatar-preview-img').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function updateCharCount(textarea) {
        const count = textarea.value.length;
        const counter = document.getElementById('bio-char-counter');
        counter.textContent = `${count} / 500 karakter`;
    }
</script>
@endsection
