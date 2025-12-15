<nav class="bg-[#ffc0cb] sticky top-0 z-50 shadow-sm" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a class="text-2xl font-bold text-white tracking-tight" href="#">
            Browny<span class="text-pink-600">Gift</span>
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="#about" class="text-white hover:text-pink-600 font-medium transition">Tentang Kami</a>
            <a href="#services" class="text-white hover:text-pink-600 font-medium transition">Layanan</a>
            <a href="#products" class="text-white hover:text-pink-600 font-medium transition">Produk</a>
            <a href="#contact" class="text-white hover:text-pink-600 font-medium transition">Hubungi Kami</a>
            <a href="<?php echo e(url('/login')); ?>" class="bg-white text-[#ffc0cb] px-6 py-2 rounded-full font-bold border-2 border-white hover:bg-transparent hover:text-white transition duration-300">Login</a>
        </div>

        <div class="md:hidden flex items-center">
            <button id="menu-btn" class="text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#ffc0cb] border-t border-pink-200">
        <div class="flex flex-col p-6 space-y-4">
            <a href="#about" class="text-white">Tentang Kami</a>
            <a href="#services" class="text-white">Layanan</a>
            <a href="#products" class="text-white">Produk</a>
            <a href="#contact" class="text-white">Hubungi Kami</a>
            <a href="<?php echo e(url('/login')); ?>" class="bg-white text-[#ffc0cb] py-3 rounded-xl text-center font-bold">Login</a>
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    btn.onclick = () => menu.classList.toggle('hidden');
</script><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/components/navbar.blade.php ENDPATH**/ ?>