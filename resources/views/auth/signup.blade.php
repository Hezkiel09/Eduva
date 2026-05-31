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
            align-items: center;
        }
        .signup-hero {
            background: #F8FAFC;
            border-radius: 36px;
            overflow: hidden;
            box-shadow: 0 40px 120px rgba(15, 23, 42, 0.12);
            min-height: 720px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .signup-hero img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }
        .signup-panel {
            background: #ffffff;
            border-radius: 36px;
            box-shadow: 0 40px 120px rgba(15, 23, 42, 0.08);
            padding: 52px;
        }
        .signup-eyebrow {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 9999px;
            background: #EFF6FF;
            color: #2563EB;
            font-size: 0.88rem;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .signup-panel h1 {
            margin: 0;
            font-size: clamp(2.8rem, 3.4vw, 3.6rem);
            line-height: 1.02;
            font-weight: 800;
            color: #0F172A;
        }
        .signup-subtitle {
            margin: 18px 0 36px;
            color: #475569;
            line-height: 1.8;
            max-width: 540px;
        }
        .signup-form {
            display: grid;
            gap: 22px;
        }
        .signup-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }
        .signup-field {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 600;
            color: #334155;
        }
        .signup-field input {
            width: 100%;
            border: 1px solid #CBD5E1;
            border-radius: 16px;
            padding: 15px 18px;
            font-size: 0.98rem;
            color: #0F172A;
            background: #F8FAFC;
        }
        .signup-field input:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }
        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #475569;
            margin-top: 4px;
        }
        .checkbox-row input {
            width: 18px;
            height: 18px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
        }
        .signup-actions {
            margin-top: 24px;
            display: grid;
            gap: 16px;
        }
        .signup-actions .btn-primary {
            width: 100%;
            padding: 16px 0;
            border-radius: 16px;
            font-size: 1rem;
        }
        .signup-note {
            text-align: center;
            color: #64748B;
            margin: 0;
        }
        .signup-note a {
            color: #2563EB;
            font-weight: 700;
        }
        .signup-social {
            margin-top: 36px;
            display: grid;
            gap: 14px;
            text-align: center;
        }
        .social-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }
        .social-grid a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid #CBD5E1;
            border-radius: 14px;
            padding: 14px 0;
            color: #0F172A;
            background: #ffffff;
        }
        @media (max-width: 992px) {
            .signup-grid {
                grid-template-columns: 1fr;
            }
            .signup-panel {
                padding: 34px 28px;
            }
            .signup-hero {
                min-height: 420px;
            }
        }
    </style>

    <div class="page-container signup-page">
        <div class="signup-grid">
            <div class="signup-hero">
                <img src="{{ asset('img/register/Group 4.png') }}" alt="Eduva signup illustration" />
            </div>

            <div class="signup-panel">
                <span class="signup-eyebrow">Daftar Sekarang</span>
                <h1>Sign up</h1>
                <p class="signup-subtitle">Let's get you all set up so you can access your personal account.</p>

                @if ($errors->any())
                    <div style="margin-bottom: 24px; padding: 18px 20px; border-radius: 20px; background: #FEE2E2; color: #B91C1C; border: 1px solid #FCA5A5;">
                        <strong>Terjadi kesalahan:</strong>
                        <ul style="margin: 12px 0 0 18px; padding: 0; list-style: disc;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="signup-form">
                        <div class="signup-row">
                            <label class="signup-field">
                                Username
                                <input type="text" name="username" value="{{ old('username') }}" placeholder="john.doe" required />
                            </label>
                            <label class="signup-field">
                                Email
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="john.doe@gmail.com" required />
                            </label>
                        </div>

                        <div class="signup-row">
                            <label class="signup-field">
                                Password
                                <input type="password" name="password" placeholder="Minimal 8 karakter" required />
                            </label>
                            <label class="signup-field">
                                Confirm Password
                                <input type="password" name="password_confirmation" placeholder="Masukkan ulang password" required />
                            </label>
                        </div>

                        <label class="checkbox-row">
                            <input type="checkbox" name="terms" required />
                            I agree to all the <a href="#">Terms</a> and <a href="#">Privacy Policies</a>
                        </label>
                    </div>

                    <div class="signup-actions">
                        <button type="submit" class="btn btn-primary">Create account</button>
                        <p class="signup-note">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>

                <div class="signup-social">
                    <span>Or Sign up with</span>
                    <div class="social-grid">
                        <a href="#">Google</a>
                        <a href="#">Apple</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection