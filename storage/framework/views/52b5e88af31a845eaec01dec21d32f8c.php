

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<div class="relative bg-cover bg-center h-[300px]" style="background-image: url('<?php echo e(asset('banner.png')); ?>');">
    <div class="absolute inset-0 bg-[#5E7CC7] bg-opacity-70 flex items-center">
        <div class="container mx-auto text-white px-6">
            <h1 class="text-6xl font-bold font-poppins text-[#FBFF00]">
                Intern, Innovate, Inspire
            </h1>
            <p class="mt-4 text-lg font-inter">Segera daftarkan dirimu untuk mendapatkan kesempatan</p>
            <a href="<?php echo e(route('contact')); ?>" class="mt-6 inline-block bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold shadow-md">
                Hubungi Kami
            </a>
        </div>
    </div>
</div>

<!-- Section Fitur -->
<div class="container mx-auto py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Tentang Program -->
        <div class="bg-[#E8E8E8] shadow-md p-6 rounded-lg">
            <h3 class="text-lg font-bold text-purple-600 font-poppins">Tentang Program</h3>
            <p class="text-gray-600 mt-2 font-inter">
                Program ini dirancang untuk memberikan <span class="text-blue-500 font-semibold">pengalaman</span> kepada mahasiswa 
                atau siswa dalam dunia industri.
            </p>
        </div>

        <!-- Fitur Utama -->
        <div class="bg-[#E8E8E8] shadow-md p-6 rounded-lg">
            <h3 class="text-lg font-bold text-purple-600 font-poppins">Fitur Utama</h3>
            <ul class="text-gray-600 mt-2 font-inter">
                <li><span class="font-semibold text-blue-600">✔ Manajemen Tugas:</span> Mengelola tugas harian lebih efisien.</li>
                <li><span class="font-semibold text-blue-600">✔ Pelaporan Kinerja:</span> Melihat dan melaporkan progres magang.</li>
                <li><span class="font-semibold text-blue-600">✔ Notifikasi Otomatis:</span> Pengingat otomatis untuk tugas.</li>
            </ul>
        </div>

        <!-- Kesempatan Mengikuti Program -->
        <div class="bg-[#E8E8E8] shadow-md p-6 rounded-lg">
            <h3 class="text-lg font-bold text-purple-600 font-poppins">Kesempatan Mengikuti Program</h3>
            <ul class="text-gray-600 mt-2 font-inter">
                <li><span class="font-semibold text-blue-600">✔</span> Pengalaman kerja nyata</li>
                <li><span class="font-semibold text-blue-600">✔</span> Meningkatkan soft skills dan teknis</li>
                <li><span class="font-semibold text-blue-600">✔</span> Sertifikat untuk meningkatkan CV</li>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#679CEB] text-white py-8">
    <div class="container mx-auto text-center">
        <p class="font-inter">Jalan Mesjid No. 1 Kota Sukabumi 43111, Sukabumi, West Java</p>
        <p class="font-inter">📞 +85253000843 | 📧 @TelkomIndonesia | 🌐 @plasatelkomsukabumi</p>
    </div>
</footer>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/dashboard/index.blade.php ENDPATH**/ ?>