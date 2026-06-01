@extends('layouts.app')

@section('title', 'Daftar - Eduva')

@section('content')
    <div class="page-container" style="padding: 60px 0;">
        <div class="grid md:grid-cols-2 gap-10 items-center" style="align-items: stretch;">
            <div style="display: flex; justify-content: center; align-items: center;">
                <div style="width: 100%; max-width: 520px; background: #ffffff; border-radius: 32px; overflow: hidden; box-shadow: 0 28px 90px rgba(15, 23, 42, 0.14);">
                        <img src="{{ asset('img/register/Group 4.png') }}" alt="Eduva signup illustration" style="width: 100%; display: block; object-fit: cover;" />

            <section style="background: #ffffff; border-radius: 32px; box-shadow: 0 28px 90px rgba(15, 23, 42, 0.08); padding: 44px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; gap: 16px; flex-wrap: wrap;">
                    <div>
                        <p style="font-size: 0.95rem; color: #64748B; margin-bottom: 10px;">Buat akun Eduva</p>
                        <h1 style="margin: 0; font-size: clamp(2.2rem, 3vw, 3rem); line-height: 1.05; font-weight: 800; color: #0F172A;">Daftar</h1>
                    </div>
                    <img src="{{ asset('img/asset_login/logo eduva.png') }}" alt="Eduva logo" style="height: 48px; width: auto;" />
                </div>

                <p style="color: #64748B; line-height: 1.8; margin-bottom: 32px;">Isi data Anda untuk membuat akun. Setelah terdaftar, Anda bisa masuk dan mulai mengerjakan assessment serta melihat rekomendasi karir.</p>

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

                    <div style="display: grid; gap: 18px;">
                        <label style="display: flex; flex-direction: column; gap: 10px; font-weight: 600; color: #334155;">
                            Username
                            <input type="text" name="username" value="{{ old('username') }}" placeholder="john.doe" required style="width: 100%; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 16px; font-size: 0.95rem;" />
                        </label>

                        <label style="display: flex; flex-direction: column; gap: 10px; font-weight: 600; color: #334155;">
                            Email
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="john.doe@gmail.com" required style="width: 100%; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 16px; font-size: 0.95rem;" />
                        </label>

                        <label style="display: flex; flex-direction: column; gap: 10px; font-weight: 600; color: #334155;">
                            Password
                            <input type="password" name="password" placeholder="Minimal 8 karakter" required style="width: 100%; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 16px; font-size: 0.95rem;" />
                        </label>

                        <label style="display: flex; flex-direction: column; gap: 10px; font-weight: 600; color: #334155;">
                            Konfirmasi Password
                            <input type="password" name="password_confirmation" placeholder="Masukkan ulang password" required style="width: 100%; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 16px; font-size: 0.95rem;" />
                        </label>

                        <label style="display: inline-flex; align-items: center; gap: 12px; color: #475569;">
                            <input type="checkbox" name="terms" required style="width: 18px; height: 18px; border: 1px solid #CBD5E1; border-radius: 6px;" />
                            Saya setuju dengan <a href="#" style="color: #2563EB;">Syarat dan Ketentuan</a> serta <a href="#" style="color: #2563EB;">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <div style="margin-top: 20px; display: flex; flex-direction: column; gap: 18px;">
                        <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 16px; padding: 16px;">Buat akun</button>

                        <p style="text-align: center; color: #64748B; margin: 0;">Sudah punya akun? <a href="{{ route('login') }}" style="color: #2563EB; font-weight: 700;">Masuk</a></p>
                    </div>
                </form>

                <div style="margin-top: 32px; display: grid; gap: 14px; text-align: center;">
                    <span style="color: #94A3B8;">Atau daftar dengan</span>
                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px;">
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 0; color: #0F172A;">Google</a>
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 1px solid #CBD5E1; border-radius: 14px; padding: 14px 0; color: #0F172A;">Apple</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection