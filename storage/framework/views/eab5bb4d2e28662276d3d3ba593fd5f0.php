

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="text-center"><i class="fas fa-edit"></i> Edit Tugas</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($task->title); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo e($task->description); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Tugas</label>
                    <input type="file" class="form-control" id="file" name="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/tasks/edit.blade.php ENDPATH**/ ?>