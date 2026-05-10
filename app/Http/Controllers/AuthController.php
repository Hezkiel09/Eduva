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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => strtolower($validated['username']),
            'email' => $validated['email'] ?? null,
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    
    $credentials['username'] = strtolower($credentials['username']);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    return back()->withErrors([
        'username' => 'ID atau password salah'
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

