<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
            'terms'    => 'accepted',
        ], [
            'username.required'  => 'Username wajib diisi.',
            'username.unique'    => 'Username ini sudah dipakai, coba gunakan nama lain.',
            'username.max'       => 'Username tidak boleh lebih dari 50 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid. Contoh: nama@email.com',
            'email.unique'       => 'Email ini sudah terdaftar. Coba masuk atau gunakan email lain.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.regex'     => 'Password harus mengandung minimal 1 huruf kapital dan 1 angka. Contoh: Belajar123',
            'password.confirmed' => 'Konfirmasi password tidak cocok. Periksa kembali.',
            'terms.accepted'     => 'Kamu harus menyetujui Syarat dan Ketentuan untuk mendaftar.',
        ]);

        User::create([
            'username' => strtolower($validated['username']),
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat! Silakan masuk dengan username dan password kamu.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginValue = strtolower($request->input('username'));
        $loginType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $loginValue,
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'username' => 'Email/Username atau password yang Anda masukkan salah. Periksa kembali dan coba lagi.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function submitForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid. Contoh: nama@email.com',
            'email.exists' => 'Email tidak terdaftar. Coba gunakan email lain.',
        ]);

        $request->session()->put('reset_email', $request->input('email'));

        return redirect()->route('password.reset');
    }

    public function showResetPassword(Request $request)
    {
        if (!$request->session()->has('reset_email')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    public function submitResetPassword(Request $request)
    {
        if (!$request->session()->has('reset_email')) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung minimal 1 huruf kapital dan 1 angka. Contoh: Belajar123',
            'password.confirmed' => 'Konfirmasi password tidak cocok. Periksa kembali.',
        ]);

        $email = $request->session()->get('reset_email');
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        $request->session()->forget('reset_email');

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah. Silakan masuk.');
    }
}