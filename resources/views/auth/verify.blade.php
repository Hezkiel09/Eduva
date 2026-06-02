@extends('layouts.app')

@section('title', 'Verifikasi Kode - Eduva')

@section('content')
    <style>
        .verify-page {
            padding: 80px 0;
        }
        .verify-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 42px;
            align-items: center;
        }

        .verify-panel {
            padding: 20px 0;
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #475569;
            font-size: 0.93rem;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 32px;
            transition: color .2s;
        }
        .back-link:hover { color: #2563EB; }
        .back-link svg { width: 16px; height: 16px; }

        .verify-panel h1 {
            font-size: clamp(2rem, 3vw, 2.6rem);
            font-weight: 800;
            color: #0F172A;
            margin: 0 0 14px;
            line-height: 1.1;
        }
        .verify-panel .subtitle {
            color: #64748B;
            font-size: 0.98rem;
            line-height: 1.7;
            margin: 0 0 36px;
            max-width: 420px;
        }

        .verify-form {
            display: grid;
            gap: 20px;
            max-width: 480px;
        }
        .verify-field {
            position: relative;
            margin-top: 10px;
        }
        .verify-field label {
            position: absolute;
            top: -9px;
            left: 14px;
            padding: 0 5px;
            background: #ffffff;
            font-size: 0.78rem;
            font-weight: 600;
            color: #64748B;
            pointer-events: none;
            z-index: 1;
            line-height: 1;
        }
        .verify-field input {
            width: 100%;
            padding: 15px 50px 15px 18px;
            border: 1.5px solid #CBD5E1;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 3px;
            color: #0F172A;
            background: #ffffff;
            box-sizing: border-box;
            transition: border-color .2s, box-shadow .2s;
        }
        .verify-field input:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }
        .verify-field input:focus ~ label {
            color: #2563EB;
        }
        .field-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94A3B8;
            background: none;
            border: none;
            padding: 4px;
            display: flex;
            align-items: center;
        }

        .resend-row {
            font-size: 0.93rem;
            color: #475569;
            margin-top: -4px;
        }
        .resend-row a {
            color: #2563EB;
            font-weight: 700;
            text-decoration: none;
        }
        .resend-row a:hover { text-decoration: underline; }

        .verify-actions {
            margin-top: 8px;
        }
        .verify-actions .btn-primary {
            width: 100%;
            padding: 16px 0;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
        }

        .verify-alert {
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 0.93rem;
            margin-bottom: 4px;
        }
        .verify-alert.error {
            background: #FEE2E2;
            color: #B91C1C;
            border: 1px solid #FCA5A5;
        }
        .verify-alert.success {
            background: #D1FAE5;
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .verify-illustration {
            background: #F1F5F9;
            border-radius: 36px;
            overflow: hidden;
            min-height: 580px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .verify-illustration img {
            width: 100%;
            max-width: 420px;
            height: auto;
            object-fit: contain;
            display: block;
        }

        @media (max-width: 992px) {
            .verify-grid { grid-template-columns: 1fr; }
            .verify-illustration { min-height: 300px; }
            .verify-illustration img { max-width: 260px; margin: 0 auto; }
        }
        @media (max-width: 600px) {
            .verify-illustration { display: none; }
        }
    </style>

    <div class="page-container verify-page">
        <div class="verify-grid">

            <div class="verify-panel">
                <a href="{{ route('login') }}" class="back-link">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Kembali ke halaman masuk
                </a>

                <h1>Verifikasi Kode</h1>
                <p class="subtitle">Kode verifikasi telah dikirim ke email kamu. Periksa kotak masuk atau folder spam-mu.</p>

                @if ($errors->any())
                    <div class="verify-alert error" style="margin-bottom: 20px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="verify-alert success" style="margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('verify.submit') }}" class="verify-form">
                    @csrf

                    <div class="verify-field">
                        <label>Masukkan Kode</label>
                        <input
                            type="text"
                            id="verifyCode"
                            name="code"
                            value="{{ old('code') }}"
                            placeholder="XXXXXXXX"
                            maxlength="8"
                            autocomplete="one-time-code"
                            required
                            style="text-transform: uppercase;"
                        />
                        <button type="button" class="field-toggle" onclick="toggleCode()" aria-label="Toggle visibility">
                            <svg id="codeEyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>

                    <p class="resend-row">
                        Tidak menerima kode?
                        <a href="{{ route('verify.resend') }}">Kirim ulang</a>
                    </p>

                    <div class="verify-actions">
                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                    </div>
                </form>
            </div>

            <div class="verify-illustration">
                <img src="{{ asset('img/register/verification.png') }}" alt="Verify your account" />
            </div>

        </div>
    </div>

    <script>
        let codeVisible = true;
        function toggleCode() {
            const input = document.getElementById('verifyCode');
            const icon  = document.getElementById('codeEyeIcon');
            codeVisible = !codeVisible;
            if (!codeVisible) {
                input.setAttribute('type', 'password');
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
            } else {
                input.setAttribute('type', 'text');
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
@endsection