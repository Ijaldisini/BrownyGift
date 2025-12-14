@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 mb-6">
    <div class="mb-6">
        <h4 class="text-2xl font-semibold text-gray-900 mb-2">Profil Saya</h4>
        <p class="text-gray-500">Kelola informasi profil Anda</p>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r">
        <div class="flex items-center justify-between">
            <p class="text-green-700">{{ session('success') }}</p>
            <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    @endif

    <div class="text-center">
        <div class="inline-block relative">
            <img src="{{ asset('images/admin-avatar.jpg') }}"
                alt="Admin Photo"
                class="w-32 h-32 rounded-full object-cover border-4 border-pink-100"
                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->nama ?? 'Admin BrownyGift') }}&size=128&background=ff69b4&color=fff'">
        </div>
        <div class="mt-4">
            <h5 class="text-lg font-semibold text-gray-900 mb-1">{{ $user->nama ?? 'Admin BrownyGift' }}</h5>
            <p class="text-gray-600 mb-2">{{ $user->email ?? 'admin@brownygift.com' }}</p>
            <span class="inline-block bg-pink-100 text-primary px-4 py-1.5 rounded-full text-xs font-medium">Admin</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-8 mb-6">
    <div class="flex items-center text-primary font-semibold mb-6">
        <i class="bi bi-person-circle text-lg mr-2"></i>
        <span class="text-sm uppercase tracking-wider">Informasi Profil</span>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text"
                    class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('nama_lengkap') border-red-500 @enderror"
                    name="nama_lengkap"
                    value="{{ old('nama_lengkap', $user->nama ?? 'Admin BrownyGift') }}"
                    required>
                @error('nama_lengkap')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email"
                    class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                    name="email"
                    value="{{ old('email', $user->email ?? 'admin@brownygift.com') }}"
                    required>
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">No. Handphone</label>
            <input type="text"
                class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('no_handphone') border-red-500 @enderror"
                name="no_handphone"
                value="{{ old('no_handphone', $user->no_hp ?? '082345678910') }}"
                required>
            @error('no_handphone')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<div class="bg-white rounded-lg shadow-sm p-8">
    <div class="flex items-center text-primary font-semibold mb-6">
        <i class="bi bi-lock text-lg mr-2"></i>
        <span class="text-sm uppercase tracking-wider">Ganti Password</span>
    </div>

    <form action="{{ route('admin.profile.password') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
            <input type="password"
                class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('password_lama') border-red-500 @enderror"
                name="password_lama"
                required>
            @error('password_lama')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
            <input type="password"
                class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('password_baru') border-red-500 @enderror"
                name="password_baru"
                required>
            @error('password_baru')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
            <input type="password"
                class="w-full px-4 py-2.5 border border-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('password_baru_confirmation') border-red-500 @enderror"
                name="password_baru_confirmation"
                required>
            @error('password_baru_confirmation')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow">
                Ganti Password
            </button>
        </div>
    </form>
</div>
@endsection