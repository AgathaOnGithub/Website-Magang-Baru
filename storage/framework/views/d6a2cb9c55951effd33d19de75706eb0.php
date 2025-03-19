

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="text-center mb-4 font-weight-bold">Profil Pengguna</h2>
    <div class="card shadow border-0 rounded-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <?php if($user->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/profile_pictures/' . $user->profile_picture)); ?>" class="rounded-circle" width="150" alt="Foto Profil">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/profile/default.png')); ?>" class="rounded-circle" width="150" alt="Foto Profil">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <h4><?php echo e($user->name); ?></h4>
                    <p>Email: <?php echo e($user->email); ?></p>
                    <p>No. Telepon: <?php echo e($user->phone ?? 'Tidak tersedia'); ?></p>
                    <p>Alamat: <?php echo e($user->address ?? 'Tidak tersedia'); ?></p>
                    
                    <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'pembimbing'): ?>
                        <hr>
                        <h5>Informasi Magang</h5>
                        <p>Program Magang: <?php echo e($user->internship ? $user->internship->title : 'Sudah Terdaftar'); ?></p>
                        <p>Status: <?php echo e($user->internship_status ?? 'Mahasiswa'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/profile.blade.php ENDPATH**/ ?>