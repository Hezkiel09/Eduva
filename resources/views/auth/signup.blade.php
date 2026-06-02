@extends('layouts.app')

@section('title', 'Daftar - Eduva')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
    <div class="page-container login-page">
        <div class="login-grid">
            <div class="signup-illustration">
                <img src="{{ asset('img/register/Group 4.png') }}" alt="Eduva signup illustration" />
            </div>

            <section class="login-panel">
                <div class="signup-header">
                    <div>
                        <p>Buat akun Eduva</p>
                        <h1 class="welcome-title">Daftar</h1>
                    </div>
                    <img src="{{ asset('img/asset_login/logo eduva.png') }}" alt="Eduva logo" class="signup-logo" />
                </div>

                <p class="signup-desc">Isi data Anda untuk membuat akun. Setelah terdaftar, Anda bisa masuk dan mulai mengerjakan assessment serta melihat rekomendasi karir.</p>

                @if ($errors->any())
                    <div class="login-error">
                        <strong>Terjadi kesalahan:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="login-form">
                    @csrf

                    <div class="login-field">
                        <label>Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="john.doe" required />
                    </div>

                    <div class="login-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="john.doe@gmail.com" required />
                    </div>

                    <div class="login-field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Min. 8 karakter" required />
                        <small style="color: #6B7280; font-size: 0.8rem; margin-top: 4px; display: block;">
                            🔒 Harus mengandung minimal 8 karakter, 1 huruf kapital, dan 1 angka
                        </small>
                    </div>

                    <div class="login-field">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="Masukkan ulang password" required />
                    </div>

                    <div style="margin-top: 10px;">
                        <label class="checkbox-field">
                            <input type="checkbox" name="terms" required />
                            <span>Saya setuju dengan <a href="#">Syarat dan Ketentuan</a> serta <a href="#">Kebijakan Privasi</a></span>
                        </label>
                    </div>

                    <div class="login-actions">
                        <button type="submit" class="btn btn-primary">Buat akun</button>
                        <p class="login-note">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                    </div>
                </form>

                <div class="login-social">
                    <span>Atau daftar dengan</span>
                    <div class="social-grid">
                        <a href="#">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Google
                        </a>
                        <a href="#">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                            </svg>
                            Apple
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection