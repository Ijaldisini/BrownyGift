<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto animate-fadeIn">
    <!-- Success Message -->
    <?php if(session('success')): ?>
    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-l-4 border-emerald-500 p-5 mb-8 rounded-r-2xl shadow-lg animate-slideDown" role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-check-lg text-white text-xl"></i>
                </div>
                <p class="text-emerald-800 font-medium"><?php echo e(session('success')); ?></p>
            </div>
            <button type="button" class="text-emerald-700 hover:text-emerald-900 hover:bg-emerald-100 rounded-lg p-2 transition-colors" onclick="this.parentElement.parentElement.remove()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Profile Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100 mb-8">
        <!-- Header with Gradient -->
        <div class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-600 p-8">
            <div class="flex items-center justify-between">
                <div class="text-white">
                    <h2 class="text-3xl font-bold mb-2 flex items-center">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4">
                            <i class="bi bi-person-circle text-white text-2xl"></i>
                        </div>
                        Profil Saya
                    </h2>
                    <p class="text-pink-100">Kelola informasi profil Anda</p>
                </div>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="inline-block relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                    <div class="relative">
                        <img src="<?php echo e(asset('images/admin-avatar.jpg')); ?>"
                            alt="Admin Photo"
                            class="w-40 h-40 rounded-full object-cover border-8 border-white shadow-2xl relative z-10"
                            onerror="this.src='https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->nama ?? 'Admin BrownyGift')); ?>&size=160&background=ff69b4&color=fff&bold=true&font-size=0.4'">
                        
                    </div>
                </div>
                <div class="mt-6">
                    <h5 class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent mb-2">
                        <?php echo e($user->nama ?? 'Admin BrownyGift'); ?>

                    </h5>
                    <p class="text-gray-600 mb-3 flex items-center justify-center">
                        <i class="bi bi-envelope mr-2 text-pink-500"></i>
                        <?php echo e($user->email ?? 'admin@brownygift.com'); ?>

                    </p>
                    <span class="inline-flex items-center space-x-2 bg-gradient-to-r from-pink-100 to-rose-100 text-pink-700 px-6 py-2 rounded-xl text-sm font-bold border-2 border-pink-200 shadow-sm">
                        <i class="bi bi-shield-check"></i>
                        <span>Administrator</span>
                    </span>
                </div>
            </div>


        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100 mb-8">
        <div class="bg-gradient-to-r from-pink-50 via-rose-50 to-pink-50 p-6 border-b-2 border-pink-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-pencil-square text-white"></i>
                </div>
                <h3 class="text-xl font-bold bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">
                    Informasi Profil
                </h3>
            </div>
        </div>

        <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" class="p-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center mr-2">
                            <i class="bi bi-person text-white text-xs"></i>
                        </div>
                        Nama Lengkap <span class="text-pink-500 ml-1">*</span>
                    </label>
                    <input type="text"
                        class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                        name="nama_lengkap"
                        value="<?php echo e(old('nama_lengkap', $user->nama ?? 'Admin BrownyGift')); ?>"
                        placeholder="Masukkan nama lengkap"
                        required>
                    <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="bi bi-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-2">
                            <i class="bi bi-envelope text-white text-xs"></i>
                        </div>
                        Email <span class="text-pink-500 ml-1">*</span>
                    </label>
                    <input type="email"
                        class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                        name="email"
                        value="<?php echo e(old('email', $user->email ?? 'admin@brownygift.com')); ?>"
                        placeholder="admin@brownygift.com"
                        required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="bi bi-exclamation-circle mr-1"></i>
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- No Handphone -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-phone text-white text-xs"></i>
                    </div>
                    No. Handphone <span class="text-pink-500 ml-1">*</span>
                </label>
                <input type="text"
                    class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['no_handphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                    name="no_handphone"
                    value="<?php echo e(old('no_handphone', $user->no_hp ?? '082345678910')); ?>"
                    placeholder="08123456789"
                    required>
                <?php $__errorArgs = ['no_handphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="bi bi-exclamation-circle mr-1"></i>
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-6 border-t-2 border-pink-100">
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white px-10 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center space-x-2 hover:-translate-y-0.5">
                    <i class="bi bi-check-circle text-xl"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Change Password Form -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">
        <div class="bg-gradient-to-r from-pink-50 via-rose-50 to-pink-50 p-6 border-b-2 border-pink-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                    <i class="bi bi-shield-lock text-white"></i>
                </div>
                <h3 class="text-xl font-bold bg-gradient-to-r from-amber-600 to-orange-500 bg-clip-text text-transparent">
                    Ganti Password
                </h3>
            </div>
        </div>

        <form action="<?php echo e(route('admin.profile.password')); ?>" method="POST" class="p-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Password Lama -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-lock text-white text-xs"></i>
                    </div>
                    Password Lama <span class="text-pink-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <input type="password"
                        class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['password_lama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                        name="password_lama"
                        placeholder="Masukkan password lama"
                        required>
                    <i class="bi bi-lock-fill absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <?php $__errorArgs = ['password_lama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="bi bi-exclamation-circle mr-1"></i>
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password Baru -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-key text-white text-xs"></i>
                    </div>
                    Password Baru <span class="text-pink-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <input type="password"
                        class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['password_baru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                        name="password_baru"
                        placeholder="Masukkan password baru"
                        required>
                    <i class="bi bi-key-fill absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <?php $__errorArgs = ['password_baru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="bi bi-exclamation-circle mr-1"></i>
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                    <div class="w-6 h-6 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center mr-2">
                        <i class="bi bi-shield-check text-white text-xs"></i>
                    </div>
                    Konfirmasi Password Baru <span class="text-pink-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <input type="password"
                        class="w-full px-5 py-3.5 border-2 border-pink-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all <?php $__errorArgs = ['password_baru_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> hover:border-pink-300"
                        name="password_baru_confirmation"
                        placeholder="Ulangi password baru"
                        required>
                    <i class="bi bi-shield-fill-check absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <?php $__errorArgs = ['password_baru_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="bi bi-exclamation-circle mr-1"></i>
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-6 border-t-2 border-pink-100">
                <button type="submit" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-10 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center space-x-2 hover:-translate-y-0.5">
                    <i class="bi bi-shield-check text-xl"></i>
                    <span>Ganti Password</span>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

.animate-slideDown {
    animation: slideDown 0.4s ease-out;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/admin/profile.blade.php ENDPATH**/ ?>