<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileAdminController extends Controller
{
    /**
     * Display the profile page.
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.admin.profile', compact('user'));
    }

    /**
     * Update profile information.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'no_handphone' => 'required|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ], [
            'password_lama.required' => 'Password lama harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'password_baru.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Cek apakah password lama benar
        if (!Hash::check($request->password_lama, $user->password)) {
            return redirect()->route('profile.index')
                ->withErrors(['password_lama' => 'Password lama tidak sesuai'])
                ->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Password berhasil diperbarui!');
    }
}
