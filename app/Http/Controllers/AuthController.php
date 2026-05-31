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
            // SRS SC-02: min 8 char, 1 uppercase, 1 digit
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
            'terms'    => 'accepted',
        ]);

        User::create([
            'username' => strtolower($validated['username']),
            'email'    => $validated['email'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials['username'] = strtolower($credentials['username']);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'username' => 'Email atau password yang Anda masukkan salah. Periksa kembali dan coba lagi.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
