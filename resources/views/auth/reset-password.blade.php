@extends('layouts.app')

@section('title', 'Set Password - Eduva')

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

                <h1 class="welcome-title" style="font-size: 2.2rem; font-weight: 800; color: #0F172A; margin: 0 0 12px 0;">Set a password</h1>
                <p style="font-size: 0.95rem; color: #64748B; margin-bottom: 32px; line-height: 1.6;">Your previous password has been reseted. Please set a new password for your account.</p>

                @if ($errors->any())
                    <div class="login-error">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="login-form">
                    @csrf

                    <div class="login-field">
                        <label>Create Password</label>
                        <input type="password" name="password" id="createPassword" placeholder="••••••••" required />
                        <button type="button" class="field-toggle" onclick="toggleField('createPassword', 'eyeIcon1')" aria-label="Toggle password">
                            <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    <div class="login-field">
                        <label>Re-enter Password</label>
                        <input type="password" name="password_confirmation" id="confirmPassword" placeholder="••••••••" required />
                        <button type="button" class="field-toggle" onclick="toggleField('confirmPassword', 'eyeIcon2')" aria-label="Toggle password">
                            <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    <div class="login-actions" style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary" style="background: #4F46E5; border-color: #4F46E5;">Set password</button>
                    </div>
                </form>
            </section>

            <div class="signup-illustration" style="position: relative; display: flex; justify-content: center; align-items: center;">
                <div style="position: relative; width: 100%; max-width: 520px;">
                    <img src="{{ asset('img/reset_password/Rectangle 20.png') }}" alt="Eduva reset password illustration" style="width: 100%; display: block; border-radius: 32px; box-shadow: 0 28px 90px rgba(15, 23, 42, 0.14);" />
                    <div style="position: absolute; bottom: 32px; left: 0; right: 0; display: flex; justify-content: center; align-items: center; gap: 8px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #FFFFFF; display: inline-block;"></span>
                        <span style="width: 24px; height: 8px; border-radius: 4px; background: #56C2A3; display: inline-block;"></span>
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #FFFFFF; display: inline-block;"></span>
                    </div>
            </div>
        </div>
    </div>

    <script>
        function toggleField(fieldId, iconId) {
            const input = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
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
