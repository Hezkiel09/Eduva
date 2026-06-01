<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /** Tampilkan halaman verify */
    public function show(Request $request)
    {
        // Harus ada pending_user_id di session
        if (!$request->session()->has('pending_user_id')) {
            return redirect()->route('register');
        }
        return view('auth.verify');
    }

    /** Proses submit kode */
    public function submit(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:8',
        ], [
            'code.size' => 'Kode verifikasi harus 8 karakter.',
        ]);

        $userId = $request->session()->get('pending_user_id');
        $user   = User::find($userId);

        if (!$user) {
            return redirect()->route('register')
                ->withErrors(['code' => 'Sesi tidak valid. Silakan daftar ulang.']);
        }

        // Cek kode
        if (strtoupper($request->code) !== $user->verification_code) {
            return back()->withErrors(['code' => 'Kode verifikasi salah. Periksa kembali.']);
        }

        // Cek expired
        if (now()->isAfter($user->verification_code_expires_at)) {
            return back()->withErrors(['code' => 'Kode verifikasi sudah kedaluwarsa. Klik Resend untuk mendapatkan kode baru.']);
        }

        // Tandai verified
        $user->update([
            'is_verified'              => true,
            'email_verified_at'        => now(),
            'verification_code'        => null,
            'verification_code_expires_at' => null,
        ]);

        $request->session()->forget('pending_user_id');

        return redirect()->route('login')
            ->with('success', 'Akun berhasil diverifikasi! Silakan login.');
    }

    /** Kirim ulang kode */
    public function resend(Request $request)
    {
        $userId = $request->session()->get('pending_user_id');
        $user   = User::find($userId);

        if (!$user) {
            return redirect()->route('register')
                ->withErrors(['code' => 'Sesi tidak valid. Silakan daftar ulang.']);
        }

        $code = $this->generateCode();
        $user->update([
            'verification_code'            => $code,
            'verification_code_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new VerificationCodeMail($code, $user->username));

        return redirect()->route('verify.show')
            ->with('success', 'Kode verifikasi baru telah dikirim ke email kamu.');
    }

    /** Generate kode 8 karakter alfanumerik kapital */
    public static function generateCode(): string
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // hindari O/0, I/1 yang mirip
        $code  = '';
        for ($i = 0; $i < 8; $i++) {
            $code .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $code;
    }
}