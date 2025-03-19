<nav class="bg-[#679CEB] py-3 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <a href="<?php echo e(url('/')); ?>" class="text-white font-bold text-2xl flex items-center">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Logo" class="h-8 mr-2"> 
            Telkom Internship
        </a>

        <!-- Menu Navbar -->
        <ul class="flex items-center gap-4">
            <li>
                <a href="<?php echo e(route('internships.index')); ?>" 
                   class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 <?php echo e(request()->is('internships*') ? 'bg-blue-700 text-white' : ''); ?>">
                   Program Magang
                </a>
            </li>

            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role == 'admin'): ?>
                    <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 <?php echo e(request()->is('admin/dashboard') ? 'bg-blue-700 text-white' : ''); ?>">
                           Dashboard Admin
                        </a>
                    </li>
                <?php elseif(Auth::user()->role == 'pembimbing'): ?>
                    <li>
                        <a href="<?php echo e(route('pembimbing.dashboard')); ?>" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 <?php echo e(request()->is('pembimbing/dashboard') ? 'bg-blue-700 text-white' : ''); ?>">
                           Dashboard Pembimbing
                        </a>
                    </li>
                <?php elseif(Auth::user()->role == 'user'): ?>
                    <li>
                        <a href="<?php echo e(route('user.dashboard')); ?>" 
                           class="text-white hover:text-gray-200 px-4 py-2 rounded-md transition-all duration-300 <?php echo e(request()->is('user/dashboard') ? 'bg-blue-700 text-white' : ''); ?>">
                           Dashboard User
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Button Logout -->
                <li>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-300">
                            Logout
                        </button>
                    </form>
                </li>
            <?php else: ?>
                <!-- Button Login/Register jika belum login -->
                <li>
                    <a href="<?php echo e(route('login')); ?>" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition-all duration-300">
                        Log in/Register
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH C:\laragon\www\dashboard-magang\resources\views/partials/navbar.blade.php ENDPATH**/ ?>