

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Program Magang</h3>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($internships->isEmpty()): ?>
        <p class="text-center text-muted">Belum ada program magang yang tersedia.</p>
    <?php else: ?>
        <div class="row d-flex justify-content-center">
            <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 rounded-4 p-3" style="background-color: #F9FAFC;">
                        <div class="card-body">
                            <h5 class="fw-bold text-dark"><?php echo e($internship->name); ?></h5>
                            <p class="text-muted" style="font-size: 14px;"><?php echo e(Str::limit($internship->description, 120)); ?></p>
                            <a href="<?php echo e(route('internships.show', $internship->id)); ?>" class="btn btn-primary btn-sm rounded-pill px-4">
                                Lihat Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/index.blade.php ENDPATH**/ ?>