<?php $__env->startSection('title', 'Daftar Karyawan'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-4xl font-extrabold text-gray-800 tracking-tight">
                Manajemen <span class="text-pink-600">Karyawan</span>
            </h2>
            <p class="text-gray-500 mt-1 text-lg">Kelola akun dan hak akses tim operasional Anda.</p>
        </div>

        <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-pink-100 flex items-center gap-4">
            <div class="w-10 h-10 bg-pink-50 rounded-full flex items-center justify-center">
                <i class="bi bi-people-fill text-pink-600"></i>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Total Staf</p>
                <p class="text-xl font-black text-gray-800"><?php echo e(count($karyawan)); ?> <span class="text-sm font-normal text-gray-500">Orang</span></p>
            </div>
        </div>
    </div>

    <form action="/owner/karyawan_list" method="GET" class="bg-white rounded-2xl shadow-sm p-4 mb-6 border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-96">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <i class="bi bi-search text-gray-400"></i>
            </div>
            <input type="text"
                id="searchInput"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none transition-all"
                placeholder="Cari nama, email, atau ID...">
        </div>

        <div class="flex items-center gap-2 w-full md:w-auto">
            <a href="/owner/karyawan"
                class="w-full md:w-auto bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition-all font-bold shadow-lg shadow-pink-200">
                <i class="bi bi-plus-lg"></i>
                Tambah Karyawan
            </a>
        </div>
    </form>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full table-fixed text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-5 text-xs font-bold text-gray-500 uppercase tracking-widest w-20">ID</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-500 uppercase tracking-widest w-64">Nama Karyawan</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-500 uppercase tracking-widest w-64">Email</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-500 uppercase tracking-widest w-48">No. WhatsApp</th>
                        <th class="py-5 text-xs font-bold text-gray-500 uppercase tracking-widest text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody id="employeeTable" class="divide-y divide-gray-50">
                    <?php $__empty_1 = true; $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-pink-50/20 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="text-xs font-bold bg-gray-100 text-gray-500 px-2.5 py-1 rounded-lg">#<?php echo e($k->id_user); ?></span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 shrink-0 bg-gradient-to-tr from-pink-500 to-pink-400 text-white rounded-full flex items-center justify-center font-bold">
                                    <?php echo e(strtoupper(substr($k->nama, 0, 1))); ?>

                                </div>
                                <span class="text-sm font-bold text-gray-800 truncate"><?php echo e($k->nama); ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600 truncate">
                                <i class="bi bi-envelope text-gray-400"></i>
                                <?php echo e($k->email); ?>

                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="bi bi-whatsapp text-green-500"></i>
                                <?php echo e($k->no_hp); ?>

                            </div>
                        </td>
                        <td class="py-4 w-40">
                            <div class="flex justify-center items-center gap-2">
                                <a href="/owner/karyawan_edit/<?php echo e($k->id_user); ?>"
                                    class="w-10 h-10 flex items-center justify-center text-amber-500 bg-amber-50 rounded-xl hover:bg-amber-500 hover:text-white transition-all shadow-sm"
                                    title="Edit">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </a>

                                <form action="/owner/karyawan_delete/<?php echo e($k->id_user); ?>" method="GET"
                                    class="inline-flex m-0"
                                    onsubmit="return confirm('Hapus data karyawan <?php echo e($k->nama); ?>?')">
                                    <button type="submit"
                                        class="w-10 h-10 flex items-center justify-center text-red-500 bg-red-50 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm"
                                        title="Hapus">
                                        <i class="bi bi-trash3 text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center text-gray-400">
                            <i class="bi bi-person-x text-5xl mb-4 block opacity-20"></i>
                            <p class="font-bold">Belum ada karyawan terdaftar</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50/50 px-6 py-4 border-t border-gray-100">
            <p class="text-xs text-gray-500 italic">* Pastikan data email dan nomor HP sudah benar untuk akses sistem.</p>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#employeeTable tr');

        rows.forEach(row => {
            // Cek Nama dan Email
            let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            let email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            if (name.includes(filter) || email.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.owner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECT NEW NEW\BrownyGift\resources\views/dashboard/owner/karyawan_list.blade.php ENDPATH**/ ?>