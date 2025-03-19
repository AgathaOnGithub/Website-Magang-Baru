

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="text-center text-primary fw-bold">User Dashboard</h1>
    <p class="text-center">Selamat datang, <?php echo e(Auth::user()->name); ?>!</p>

    <!-- Notifikasi Berhasil -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Status Pendaftaran -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white text-center fw-bold">
            Status Pendaftaran
        </div>
        <div class="card-body text-center">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Program Magang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dashboard Management</td>
                        <td><span class="badge bg-success">Diterima</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upload Dokumen & Tugas -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
            <span>Upload Dokumen</span>
            <div>
                <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-tasks"></i> Lihat Tugas
                </a>
                <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah Tugas
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('uploads.storeUser')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="fw-bold">Upload CV (PDF/DOCX)</label>
                    <input type="file" class="form-control" name="cv" accept=".pdf,.docx" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Upload Formulir (PDF/DOCX)</label>
                    <input type="file" class="form-control" name="formulir" accept=".pdf,.docx" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-upload"></i> Upload
                </button>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/dashboard/user.blade.php ENDPATH**/ ?>