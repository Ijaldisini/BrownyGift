<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->id_role == 3)
                return redirect()->route('customer.index');

            if ($user->id_role == 2)
                return redirect('/admin');

            if ($user->id_role == 1)
                return redirect('/owner');

            return redirect('/dashboard/customer');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'nama' => 'required',
            'no_hp'    => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'id_role'     => '3',
            'email'       => $request->email,
            'nama'    => $request->nama,
            'no_hp'       => $request->no_hp,
            'password'    => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Selamat berbelanja!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Kamu berhasil logout.');
    }
}
