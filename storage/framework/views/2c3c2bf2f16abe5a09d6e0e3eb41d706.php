<?php $__env->startSection('title', 'Tambah Karyawan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

    <h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
        Tambah Akun Karyawan
    </h2>

    <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8">

        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="/owner/karyawan" class="space-y-5">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block font-semibold mb-1">Nama Karyawan</label>
                <input type="text" name="nama"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    placeholder="Masukkan nama karyawan" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Email Karyawan</label>
                <input type="email" name="email"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    placeholder="email@contoh.com" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Nomor HP</label>
                <input type="text" name="no_hp"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                    focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    placeholder="08xxxxxxxxxx" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Password Akun</label>

                <div class="flex gap-2">
                    <input type="text" id="passwordInput" name="password"
                        class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                        placeholder="Klik Generate" required>

                    <button type="button" onclick="generatePassword()"
                        class="bg-gray-100 hover:bg-pink-100 text-pink-600 font-bold px-4 rounded-xl transition">
                        Generate
                    </button>
                </div>
            </div>

            <div class="flex justify-center items-center pt-4">
                <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl transition">
                    Buat Akun
                </button>
            </div>
        </form>
    </div>

    <script>
        function generatePassword() {
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
            let password = '';

            for (let i = 0; i < 8; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }

            document.getElementById('passwordInput').value = password;
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/owner/karyawan.blade.php ENDPATH**/ ?>