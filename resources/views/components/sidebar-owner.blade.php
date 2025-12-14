<aside class="w-64 bg-gradient-to-b from-pink-600 to-pink-800 text-white shadow-xl">
    <div class="p-6 text-center">
        <h2 class="text-2xl font-bold">BrownyGift</h2>
        <p class="text-sm opacity-90">Owner Panel</p>
        <span class="inline-block mt-3 px-3 py-1 bg-yellow-400 text-pink-900 text-xs font-bold rounded-full">
            OWNER
        </span>
    </div>

    <nav class="mt-6 flex flex-col">
        @php
        // Helper function untuk menentukan class active
        $activeClass = 'bg-white/20 border-l-4 border-yellow-400';
        $defaultClass = 'px-6 py-4 hover:bg-white/10 transition border-l-4 border-transparent';
        @endphp

        <a href="/owner"
            class="{{ $defaultClass }} {{ request()->is('owner') ? $activeClass : '' }}">
            <i class="bi bi-speedometer2 text-lg mr-3"></i>
            Dashboard
        </a>

        <a href="/owner/profil_toko"
            class="{{ $defaultClass }} {{ request()->is('owner/profil_toko*') ? $activeClass : '' }}">
            <i class="bi bi-shop text-lg mr-3"></i>
            Profil Toko
        </a>

        <a href="/owner/karyawan"
            class="{{ $defaultClass }} {{ request()->is('owner/karyawan') ? $activeClass : '' }}">
            <i class="bi bi-person-plus text-lg mr-3"></i>
            Tambah Karyawan
        </a>

        <a href="/owner/karyawan_list"
            class="{{ $defaultClass }} {{ request()->is('owner/karyawan_list*') ? $activeClass : '' }}">
            <i class="bi bi-people text-lg mr-3"></i>
            Daftar Karyawan
        </a>

        <a href="/owner/laporan_penjualan"
            class="{{ $defaultClass }} {{ request()->is('owner/laporan_penjualan*') ? $activeClass : '' }}">
            <i class="bi bi-file-earmark-bar-graph text-lg mr-3"></i>
            Laporan Penjualan
        </a>

        <a href="/owner/profil_saya"
            class="{{ $defaultClass }} {{ request()->is('owner/profil_saya*') ? $activeClass : '' }}">
            <i class="bi bi-person-circle text-lg mr-3"></i>
            Profil Saya
        </a>

        <div class="my-6 border-t border-white/30"></div>

        <a href="{{ url('/logout') }}" onclick="return confirm('Keluar dari Owner Panel?')"
            class="px-6 py-4 text-white/70 hover:text-white hover:bg-white/10 transition">
            <i class="bi bi-box-arrow-left text-lg mr-3"></i>
            Logout
        </a>
    </nav>
</aside>