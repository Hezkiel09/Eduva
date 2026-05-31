<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
   
    public function show()
    {
        $user = Auth::user()->load('assessmentResults.careerTrack');

        return view('profile.show', compact('user'));
    }

  
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update([
            'username' => strtolower($validated['username']),
            'email'    => $validated['email'] ?? null,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
