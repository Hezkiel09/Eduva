<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Daftar semua pengguna (F-07: Manajemen Pengguna).
     */
    public function index()
    {
        $users = User::withCount('assessmentResults')
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Hapus pengguna (beserta data terkait via cascade).
     */
    public function destroy(User $user)
    {
        // Cegah admin menghapus akunnya sendiri
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
