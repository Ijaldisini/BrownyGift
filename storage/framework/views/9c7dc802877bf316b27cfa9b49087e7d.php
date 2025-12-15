<?php $__env->startSection('title', 'Profil Saya'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>

    <h2 class="text-3xl font-bold text-pink-800 mb-8 text-center">
        Profil Saya
    </h2>

    <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8">

        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="/owner/profil_saya" class="space-y-5">
            <?php echo csrf_field(); ?>

            
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="nama" value="<?php echo e(old('nama', $user->nama)); ?>"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="block font-semibold mb-1">Nomor HP</label>
                <input type="text" name="no_hp" value="<?php echo e(old('no_hp', $user->no_hp)); ?>"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition"
                    required>
                <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <hr class="my-4 border-gray-200">

            <p class="text-sm text-gray-500 italic text-center">
                Isi bagian password hanya jika ingin mengganti password
            </p>

            
            <div>
                <label class="block font-semibold mb-1">Password Lama</label>
                <input type="password" name="password_lama"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
                <?php $__errorArgs = ['password_lama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="block font-semibold mb-1">Password Baru</label>
                <input type="password" name="password_baru"
                    class="w-full rounded-xl border border-pink-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
                <?php $__errorArgs = ['password_baru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-500 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COOLYEAHH!!\SMT 3\BrownyGift\resources\views/dashboard/owner/profil_saya_edit.blade.php ENDPATH**/ ?>