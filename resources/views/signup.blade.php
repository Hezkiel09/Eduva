@extends('layouts.app')

@section('title', 'Daftar - Eduva')

@section('content')
    <style>
        .signup-page {
            padding: 80px 0;
        }
        .signup-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 42px;
            align-items: stretch;
        }

        /* ── LEFT: gambar ── */
        .signup-hero {
            background: #F8FAFC;
            border-radius: 36px;
            overflow: hidden;
            box-shadow: 0 40px 120px rgba(15, 23, 42, 0.12);
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .signup-hero img {
            width: 100%;
            height: 100%;
            min-height: 600px;
            display: block;
            object-fit: cover;
        }

        /* ── RIGHT: form panel ── */
        .signup-panel {
            background: #ffffff;
            border-radius: 36px;
            box-shadow: 0 40px 120px rgba(15, 23, 42, 0.08);
            padding: 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .signup-panel-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        .signup-panel-header img {
            height: 44px;
            width: auto;
        }
        .signup-eyebrow {
            font-size: 0.93rem;
            color: #64748B;
            margin-bottom: 8px;
        }
        .signup-panel h1 {
            margin: 0 0 6px;
            font-size: clamp(2rem, 3vw, 2.8rem);
            line-height: 1.05;
            font-weight: 800;
            color: #0F172A;
        }
        .signup-subtitle {
            color: #64748B;
            line-height: 1.8;
            margin: 0 0 32px;
        }

        /* ── Fields ── */
        .signup-form {
            display: grid;
            gap: 18px;
        }
        .signup-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-weight: 600;
            color: #334155;
            font-size: 0.93rem;
        }
        .signup-field input {
            width: 100%;
            border: 1.5px solid #CBD5E1;
            border-radius: 14px;
            padding: 14px 16px;
            font-size: 0.95rem;
            color: #0F172A;
            background: #F8FAFC;
            box-sizing: border-box;
            transition: border-color .2s, box-shadow .2s;
        }
        .signup-field input:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
            background: #fff;
        }
        .signup-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .checkbox-row {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #475569;
            font-size: 0.93rem;
            font-weight: 400;
        }
        .checkbox-row input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #2563EB;
            flex-shrink: 0;
        }
        .checkbox-row a { color: #2563EB; font-weight: 600; }

        /* ── Actions ── */
        .signup-actions {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .signup-actions .btn-primary {
            width: 100%;
            border-radius: 14px;
            padding: 15px 0;
            font-size: 1rem;
            font-weight: 700;
        }
        .signup-note {
            text-align: center;
            color: #64748B;
            margin: 0;
            font-size: 0.93rem;
        }
        .signup-note a { color: #2563EB; font-weight: 700; text-decoration: none; }

        /* ── Social ── */
        .signup-social {
            margin-top: 28px;
            display: grid;
            gap: 14px;
            text-align: center;
        }
        .signup-social span { color: #94A3B8; font-size: 0.9rem; }
        .social-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }
        .social-grid a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1.5px solid #CBD5E1;
            border-radius: 14px;
            padding: 13px 0;
            color: #0F172A;
            font-weight: 600;
            font-size: 0.93rem;
            text-decoration: none;
            background: #fff;
            transition: border-color .2s, background .2s;
        }
        .social-grid a:hover { border-color: #2563EB; background: #EFF6FF; }

        /* ── Error alert ── */
        .signup-error {
            margin-bottom: 20px;
            padding: 16px 18px;
            border-radius: 14px;
            background: #FEE2E2;
            color: #B91C1C;
            border: 1px solid #FCA5A5;
            font-size: 0.93rem;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .signup-grid { grid-template-columns: 1fr; }
            .signup-hero { min-height: 280px; }
            .signup-hero img { min-height: 280px; }
            .signup-panel { padding: 34px 24px; }
            .signup-row { grid-template-columns: 1fr; }
        }
    </style>

    <div class="page-container signup-page">
        <div class="signup-grid" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 42px !important;">

            {{-- KIRI: gambar --}}
            <div class="signup-hero" style="min-height: 600px;">
                <img src="{{ asset('img/register/Group 4.png') }}" alt="Eduva signup illustration" />
            </div>

            {{-- KANAN: form --}}
            <div class="signup-panel">
                <div class="signup-panel-header">
                    <div>
                        <p class="signup-eyebrow">Buat akun Eduva</p>
                        <h1>Daftar</h1>
                    </div>
                    <img src="{{ asset('img/asset_login/logo eduva.png') }}" alt="Eduva logo" />
                </div>

                <p class="signup-subtitle">Isi data Anda untuk membuat akun. Setelah terdaftar, Anda bisa masuk dan mulai mengerjakan assessment serta melihat rekomendasi karir.</p>

                @if ($errors->any())
                    <div class="signup-error">
                        <strong>Terjadi kesalahan:</strong>
                        <ul style="margin: 10px 0 0 18px; padding: 0; list-style: disc;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="signup-form">

                        <label class="signup-field">
                            Username
                            <input type="text" name="username" value="{{ old('username') }}" placeholder="john.doe" required />
                        </label>

                        <label class="signup-field">
                            Email
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="john.doe@gmail.com" required />
                        </label>

                        <div class="signup-row">
                            <label class="signup-field">
                                Password
                                <input type="password" name="password" placeholder="Minimal 8 karakter" required />
                            </label>
                            <label class="signup-field">
                                Konfirmasi Password
                                <input type="password" name="password_confirmation" placeholder="Masukkan ulang password" required />
                            </label>
                        </div>

                        <label class="checkbox-row">
                            <input type="checkbox" name="terms" required />
                            Saya setuju dengan <a href="#">Syarat dan Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>
                        </label>

                    </div>

                    <div class="signup-actions">
                        <button type="submit" class="btn btn-primary">Buat akun</button>
                        <p class="signup-note">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                    </div>
                </form>

                <div class="signup-social">
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
            </div>

        </div>
    </div>
@endsection