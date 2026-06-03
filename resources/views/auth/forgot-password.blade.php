@extends('layouts.app')

@section('title', 'Forgot Password - Eduva')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
    <div class="page-container login-page">
        <div class="login-grid">
            <section class="login-panel" style="padding: 52px; display: flex; flex-direction: column;">
                <div style="margin-bottom: 32px;">
                    <img src="{{ asset('img/asset_login/logo eduva.png') }}" alt="Eduva logo" style="height: 48px; width: auto; display: block;" />
                </div>

                <a href="{{ route('login') }}" class="back-link" style="display: inline-flex; align-items: center; gap: 8px; color: #475569; font-size: 0.95rem; text-decoration: none; font-weight: 600; margin-bottom: 24px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to login
                </a>

                <h1 class="welcome-title" style="font-size: 2.2rem; font-weight: 800; color: #0F172A; margin: 0 0 12px 0;">Forgot your password?</h1>
                <p style="font-size: 0.95rem; color: #64748B; margin-bottom: 32px; line-height: 1.6;">Don't worry, happens to all of us. Enter your email below to recover your password</p>

                @if ($errors->any())
                    <div class="login-error">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="login-form">
                    @csrf

                    <div class="login-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="john.doe@gmail.com" required autocomplete="email" />
                    </div>

                    <div class="login-actions" style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary" style="background: #4F46E5; border-color: #4F46E5;">Submit</button>
                    </div>
                </form>

                <div class="login-social" style="margin-top: 28px;">
                    <span>Or login with</span>
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

            <div class="signup-illustration" style="position: relative; display: flex; justify-content: center; align-items: center;">
                <div style="position: relative; width: 100%; max-width: 520px;">
                    <img src="{{ asset('img/reset_password/Rectangle 20.png') }}" alt="Eduva forgot password illustration" style="width: 100%; display: block; border-radius: 32px; box-shadow: 0 28px 90px rgba(15, 23, 42, 0.14);" />
                    <div style="position: absolute; bottom: 32px; left: 0; right: 0; display: flex; justify-content: center; align-items: center; gap: 8px;">
                        <span style="width: 24px; height: 8px; border-radius: 4px; background: #56C2A3; display: inline-block;"></span>
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #FFFFFF; display: inline-block;"></span>
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #FFFFFF; display: inline-block;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
