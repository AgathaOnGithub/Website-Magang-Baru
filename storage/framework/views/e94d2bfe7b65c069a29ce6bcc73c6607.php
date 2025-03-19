

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="text-center mb-4"><i class="fas fa-folder-open"></i> Daftar Tugas</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Upload Tugas
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white text-center">
            <h5 class="mb-0">Tugas yang Telah Diupload</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $fileUrl = asset('storage/' . $task->file_path);
                            $ext = pathinfo($task->file_path, PATHINFO_EXTENSION);
                            $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
                            $isPdf = $ext === 'pdf';
                        ?>
                        <tr>
                            <td><?php echo e($task->title); ?></td>
                            <td><?php echo e($task->description); ?></td>
                            <td>
                                <?php if($task->file_path): ?>
                                    <?php if($isImage): ?>
                                        <button class="btn btn-info btn-sm" onclick="showImagePreview('<?php echo e($fileUrl); ?>')">
                                            <i class="fas fa-eye"></i> Lihat Gambar
                                        </button>
                                    <?php elseif($isPdf): ?>
                                        <button class="btn btn-info btn-sm" onclick="showPdfPreview('<?php echo e(url('/preview/pdf?file=' . $task->file_path)); ?>')">
                                            <i class="fas fa-eye"></i> Lihat PDF
                                        </button>
                                    <?php else: ?>
                                        <a href="<?php echo e($fileUrl); ?>" class="btn btn-info btn-sm" download>
                                            <i class="fas fa-download"></i> Unduh
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada file</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="btn btn-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus tugas ini?');" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Pratinjau -->
            <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pratinjau File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="imagePreview" src="" alt="Preview" class="img-fluid d-none" />
                            <iframe id="previewFrame" width="100%" height="500px" class="d-none"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function showPdfPreview(pdfUrl) {
        let viewerUrl = "/pdfjs/web/viewer.html?file=" + encodeURIComponent(pdfUrl);
        document.getElementById('previewFrame').src = viewerUrl;
        document.getElementById('imagePreview').classList.add('d-none');
        document.getElementById('previewFrame').classList.remove('d-none');
        new bootstrap.Modal(document.getElementById('previewModal')).show();
    }

    function showImagePreview(imageUrl) {
        document.getElementById('imagePreview').src = imageUrl;
        document.getElementById('previewFrame').classList.add('d-none');
        document.getElementById('imagePreview').classList.remove('d-none');
        new bootstrap.Modal(document.getElementById('previewModal')).show();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/tasks/index.blade.php ENDPATH**/ ?>