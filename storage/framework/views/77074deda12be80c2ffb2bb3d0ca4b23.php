

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-5 mx-auto" 
         style="border-radius: 20px; background-color: #FFFFFF; max-width: 50rem; width: 100%; border: none; margin-top: 50px;">
        <div class="card-header text-white text-center py-3 font-weight-bold"
             style="background-color: #679CEB; border-radius: 15px 15px 0 0;">
            <h3 class="mb-0"><?php echo e($internship->name); ?></h3>
        </div>
        <div class="card-body px-5"> 
            <h5 class="font-weight-bold mt-4">Deskripsi</h5>
            <p class="text-muted font-weight-bold"><?php echo e($internship->description); ?></p>

            <h5 class="font-weight-bold mt-4">Persyaratan</h5>
            <ul class="text-muted font-weight-bold list-unstyled">
                <li>✔ CV</li>
                <li>✔ Surat Rekomendasi</li>
                <li>✔ Transkrip Sementara</li>
            </ul>

            <h5 class="font-weight-bold mt-4">Kualifikasi</h5>
            <ul class="text-muted font-weight-bold list-unstyled">
                <li>✔ Memiliki gelar di bidang terkait</li>
                <li>✔ Menguasai perangkat lunak desain</li>
                <li>✔ Pemahaman tentang desain dan pengkodean</li>
            </ul>

            <div class="d-flex justify-content-center mt-4">
                <a href="<?php echo e(route('internships.index')); ?>" 
                   class="btn px-4 py-2 mx-2" 
                   style="border-radius: 10px; background-color: #A9C3F2; color: white;">
                   Kembali
                </a>
                <a href="<?php echo e(route('internships.register', $internship->id)); ?>" 
                   class="btn px-4 py-2 mx-2" 
                   style="border-radius: 10px; background-color: #679CEB; color: white;">
                   Daftar
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/show.blade.php ENDPATH**/ ?>