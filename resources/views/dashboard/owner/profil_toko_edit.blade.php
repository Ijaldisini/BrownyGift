@extends('layouts.owner')

@section('title', 'Edit Profil Toko')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

@section('content')

<h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
    Edit Profil Toko
</h2>

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl p-10">

    <form action="/owner/profil_toko_edit" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Nama Toko</label>
            <input type="text" name="nama_toko"
                   class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                   value="{{ $toko->nama_toko }}" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                      required>{{ $toko->deskripsi }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tentang Kami</label>
            <textarea name="tentang_kami" rows="5"
                      class="w-full rounded-xl border-gray-300 focus:ring-pink-500 focus:border-pink-500"
                      required>{{ $toko->tentang_kami }}</textarea>
        </div>

        <div class="text-center pt-4">
            <button class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-8 py-3 rounded-xl transition">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>

@endsection
