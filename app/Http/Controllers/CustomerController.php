<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.customer.index');
    }

    public function profil()
    {
        return view('dashboard.customer.profil');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable', 'string', 'max:500'],
        ]);

        $user->update($validated);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai.'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function updatePhoto(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        // Hapus foto lama bila ada
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        // Upload foto baru
        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->update([
            'photo' => $path
        ]);

        return back()->with('success', 'Foto profil berhasil diubah!');
    }

    public function produk()
    {
        return view('dashboard.customer.produk');
    }

    public function keranjang()
    {
        return view('dashboard.customer.keranjang');
    }

    public function pesanansaya()
    {
        return view('dashboard.customer.pesanansaya');
    }

    public function riwayat()
    {
        return view('dashboard.customer.riwayatbelanja');
    }
}
