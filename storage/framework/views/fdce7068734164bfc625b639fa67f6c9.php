

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2><?php echo e($title); ?></h2>
    <p>Hubungi kami melalui email atau telepon:</p>
    <ul>
        <li>Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></li>
        <li>Telepon: <?php echo e($phone); ?></li>
        <li>Alamat: <?php echo e($address); ?></li>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/pages/contact.blade.php ENDPATH**/ ?>