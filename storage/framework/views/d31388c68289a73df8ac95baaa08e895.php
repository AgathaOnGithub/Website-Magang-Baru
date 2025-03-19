

<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Profil Pembimbing -->
    <h2 class="text-center mb-4 font-weight-bold">Profil Pembimbing</h2>
    <div class="card shadow-sm border-0 rounded-lg mb-5 p-4">
        <div class="card-body d-flex align-items-center">
            <div class="text-center me-4">
                <?php if(isset($pembimbing) && $pembimbing->profile_picture): ?>
                    <img src="<?php echo e(asset('storage/profile_pictures/' . $pembimbing->profile_picture)); ?>" 
                         class="rounded-circle border" width="150" alt="Foto Profil">
                <?php else: ?>
                    <img src="<?php echo e(asset('images/profile/default.png')); ?>" 
                         class="rounded-circle border" width="150" alt="Foto Profil">
                <?php endif; ?>
            </div>
            <div>
                <h4 class="fw-bold mb-1"><?php echo e($pembimbing->name ?? 'Nama tidak tersedia'); ?></h4>
                <p class="mb-1"><strong>Email:</strong> <?php echo e($pembimbing->email ?? 'Tidak tersedia'); ?></p>
                <p class="mb-1"><strong>No. Telepon:</strong> <?php echo e($pembimbing->phone ?? 'Tidak tersedia'); ?></p>
                <p class="mb-1"><strong>Major:</strong> <?php echo e($pembimbing->major ?? 'Tidak tersedia'); ?></p>
                <p class="mb-0"><strong>Universitas:</strong> <?php echo e($pembimbing->institution ?? 'Tidak tersedia'); ?></p>
            </div>
        </div>
    </div>

    <!-- Daftar Peserta Magang -->
    <h2 class="text-center mb-4 font-weight-bold">Daftar Peserta Magang</h2>
    <div class="card shadow-sm border-0 rounded-lg p-4">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>CV</th>
                        <th>Formulir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->phone); ?></td>
                            <td>
                                <?php if($user->upload && $user->upload->cv): ?>
                                    <button class="btn btn-sm btn-primary" 
                                            onclick="previewPdf('<?php echo e(route('preview.pdf', ['filename' => $user->upload->cv])); ?>')">
                                        Lihat CV
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>Belum diunggah</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($user->upload && $user->upload->formulir): ?>
                                    <button class="btn btn-sm btn-primary" 
                                            onclick="previewPdf('<?php echo e(route('preview.pdf', ['filename' => $user->upload->formulir])); ?>')">
                                        Lihat Formulir
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>Belum diunggah</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk Preview PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pratinjau Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfViewer" src="" width="100%" height="600px"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Preview PDF -->
<script>
    function previewPdf(url) {
        document.getElementById('pdfViewer').src = url;
        var modal = new bootstrap.Modal(document.getElementById('pdfModal'));
        modal.show();
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/dashboard/pembimbing.blade.php ENDPATH**/ ?>