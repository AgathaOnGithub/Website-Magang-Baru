

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2><?php echo e($title); ?></h2>
    <p><?php echo e($description); ?></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/pages/about.blade.php ENDPATH**/ ?>