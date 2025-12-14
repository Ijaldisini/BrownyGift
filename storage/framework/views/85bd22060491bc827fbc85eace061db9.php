<?php $__env->startSection('title', 'BrownyGift - Buket Bunga Aesthetic & Fresh'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-pattern {
            background-color: #fff0f5;
            background-image: radial-gradient(#ff69b4 0.5px, transparent 0.5px);
            background-size: 20px 20px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    
    <header class="hero-pattern min-h-[70vh] flex items-center justify-center text-center px-4">
        <div class="max-w-3xl">
            <span
                class="inline-block px-4 py-1 mb-4 text-sm font-semibold tracking-widest text-pink-600 uppercase bg-pink-100 rounded-full">
                Premium Florist Shop
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-gray-800 mb-6">
                <?php echo e($store->nama_toko); ?>

            </h1>
            <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed">
                <?php echo e($store->deskripsi); ?>

            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(url('/login')); ?>"
                    class="px-8 py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                    Lihat Koleksi
                </a>
                <a href="#about"
                    class="px-8 py-3 bg-white border-2 border-pink-200 text-pink-500 font-bold rounded-full hover:bg-pink-50 transition duration-300">
                    Tentang Florist
                </a>
            </div>
        </div>
    </header>

    
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=800"
                        alt="About BrownyGift" class="rounded-2xl shadow-2xl">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 relative inline-block">
                        Tentang Kami
                        <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-pink-500"></span>
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        <?php echo nl2br(e($store->tentang_kami)); ?>

                    </p>
                </div>
            </div>
        </div>
    </section>

    
    <section id="services" class="py-20 bg-pink-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Kenapa Memilih Florist Kami?</h2>
                <p class="text-gray-500">Pelayanan terbaik untuk kualitas buket bunga premium</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center border-b-4 border-pink-400">
                    <div
                        class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6 text-pink-500 text-2xl">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-gray-800">Bunga Segar</h4>
                    <p class="text-gray-600 text-sm">Kami menggunakan bunga potong segar berkualitas yang dipilih setiap
                        pagi.</p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center border-b-4 border-amber-400">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6 text-amber-600 text-2xl">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-gray-800">Custom Design</h4>
                    <p class="text-gray-600 text-sm">Sesuaikan warna kertas pembungkus dan jenis bunga sesuai keinginanmu.
                    </p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center border-b-4 border-green-400">
                    <div
                        class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-600 text-2xl">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-gray-800">Sameday Delivery</h4>
                    <p class="text-gray-600 text-sm">Pengiriman di hari yang sama untuk memastikan bunga tetap segar sampai
                        tujuan.</p>
                </div>
            </div>
        </div>
    </section>

    
    <section id="products" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">Koleksi Buket Terpopuler</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                    $items = [
                        [
                            'name' => 'Rose Romance',
                            'desc' => 'Buket mawar merah premium simbol cinta sejati.',
                            'price' => 'Rp 150.000',
                            'image_url' => 'https://i.pinimg.com/736x/5f/13/81/5f1381af806b693a9864893b1c2961ba.jpg',
                        ],
                        [
                            'name' => 'Sunflower Joy',
                            'desc' => 'Bunga matahari cerah untuk menyemangati hari.',
                            'price' => 'Rp 125.000',
                            'image_url' =>
                                'https://threebouquets.com/cdn/shop/files/product-sunflower_800x.jpg?v=1708408842',
                        ],
                        [
                            'name' => 'Tulip Pastel',
                            'desc' => 'Rangkaian tulip warna pastel yang sangat elegan.',
                            'price' => 'Rp 210.000',
                            'image_url' => 'https://i.pinimg.com/736x/af/e6/95/afe6957e27cc1dfffd73496787513567.jpg',
                        ],
                        [
                            'name' => 'Graduation Mix',
                            'desc' => 'Kombinasi bunga mix khusus hadiah wisuda.',
                            'price' => 'Rp 175.000',
                            'image_url' => 'http://i.pinimg.com/1200x/99/6c/bb/996cbb224925eb92b38c57c0fadd8ba9.jpg',
                        ],
                    ];
                ?>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="<?php echo e($item['image_url']); ?>" alt="Buket <?php echo e($item['name']); ?>"
                                class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-pink-600 font-bold text-sm">
                                <?php echo e($item['price']); ?>

                            </div>
                        </div>
                        <div class="p-6">
                            <h5 class="text-xl font-bold text-gray-800 mb-2"><?php echo e($item['name']); ?></h5>
                            <p class="text-gray-500 text-sm mb-4"><?php echo e($item['desc']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/landing.blade.php ENDPATH**/ ?>