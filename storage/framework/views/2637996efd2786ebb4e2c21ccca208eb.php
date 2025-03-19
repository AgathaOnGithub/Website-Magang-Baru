

<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 50rem; border-radius: 12px;">
        <h2 class="text-center mb-4" style="color: #d9232d;">Edit Program Magang</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('internships.update', $internship->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Program</label>
                <input type="text" name="name" class="form-control rounded-pill px-3" 
                       value="<?php echo e(old('name', $internship->name)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control rounded px-3" rows="3" required><?php echo e(old('description', $internship->description)); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label fw-bold">Lokasi</label>
                <input type="text" name="location" class="form-control rounded-pill px-3" 
                       value="<?php echo e(old('location', $internship->location)); ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="start_date" class="form-label fw-bold">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="form-control rounded px-3"
                           value="<?php echo e(old('start_date', $internship->start_date)); ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="end_date" class="form-label fw-bold">Tanggal Selesai</label>
                    <input type="date" name="end_date" class="form-control rounded px-3"
                           value="<?php echo e(old('end_date', $internship->end_date)); ?>" required>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-danger fw-bold py-2" style="border-radius: 25px;">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #d9232d;
        box-shadow: 0 0 5px rgba(217, 35, 45, 0.5);
    }
    button:hover {
        background-color: #b71c1c !important;
        transition: 0.3s;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/edit.blade.php ENDPATH**/ ?>