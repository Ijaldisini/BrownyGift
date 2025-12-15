@extends('layouts.owner')

@section('title', 'Profil Saya')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

@section('content')

    <h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
        Profil Saya
    </h2>

    <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/owner/profil_saya" class="space-y-5">
            @csrf

            {{-- NAMA --}}
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                @error('nama')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- NO HP --}}
            <div>
                <label class="block font-semibold mb-1">Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                @error('no_hp')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-4 border-gray-200">

            <p class="text-sm text-gray-500 italic text-center">
                Isi bagian password hanya jika ingin mengganti password
            </p>

            {{-- PASSWORD LAMA --}}
            <div>
                <label class="block font-semibold mb-1">Password Lama</label>
                <input type="password" name="password_lama"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
                @error('password_lama')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD BARU --}}
            <div>
                <label class="block font-semibold mb-1">Password Baru</label>
                <input type="password" name="password_baru"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
                @error('password_baru')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- KONFIRMASI --}}
            <div>
                <label class="block font-semibold mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_baru_confirmation"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
            </div>

            <div class="flex justify-center pt-4">
                <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

@endsection
