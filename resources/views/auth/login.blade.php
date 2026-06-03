@extends('layouts.app')

@section('title', 'Masuk - Eduva')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')

    <div class="page-container login-page">
        <div class="login-grid">

            <div class="login-photos">
                <img src="{{ asset('img/asset_login/image 12.png') }}" alt="Eduva students" />
                <img src="{{ asset('img/asset_login/image 13.png') }}" alt="Eduva learning" />
            </div>

            <div class="login-panel">
                <h1 class="welcome-title">Selamat datang di <span>EDU</span>VA!</h1>
                <h2>Masuk ke Akun Kamu</h2>

                @if ($errors->any())
                    <div class="login-error">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div style="background: #D1FAE5; color: #065F46; border: 1px solid #6EE7B7; padding: 12px 16px; border-radius: 8px; font-size: 0.93rem; margin-bottom: 16px;">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <div class="login-field">
                        <label>Email / Username</label>
                        <input
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="john.doe atau john@gmail.com"
                            required
                            autocomplete="username"
                        />
                    </div>

                    <div class="login-field">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            id="loginPassword"
                            placeholder="••••••••••••••••••••"
                            required
                            autocomplete="current-password"
                        />
                        <button type="button" class="field-toggle" onclick="togglePassword()" aria-label="Toggle password">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    <div class="login-meta">
                        <label class="remember-label">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                            Ingat saya
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
                    </div>

                    <div class="login-actions">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <p class="login-note">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                    </div>
                </form>

                <div class="login-social">
                    <span>Atau masuk dengan</span>
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

    <script>
        function togglePassword() {
            const input = document.getElementById('loginPassword');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
            }
        }
    </script>
@endsection