 <!-- Menggunakan layout khusus tanpa navbar -->

<?php $__env->startSection('content'); ?>
<style>
    body {
        background: url('/images/bg-login.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Inter', sans-serif;
    }
    .login-container {
        max-width: 450px;
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .login-title {
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        font-weight: bold;
        color: #2C3E50;
        text-align: center;
        margin-bottom: 20px;
    }
    .form-control {
        border-radius: 10px;
        padding-left: 40px;
    }
    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }
    .btn-login {
        background-color: #5E7CC7;
        color: white;
        font-weight: bold;
        border-radius: 10px;
    }
    .btn-login:hover {
        background-color: #4A66A0;
    }
    .register-link {
        text-align: center;
        margin-top: 15px;
    }
</style>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-container">
        <h2 class="login-title">Welcome to <br> Telkom Internship</h2>

        <form action="<?php echo e(route('login.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3 position-relative">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="mb-3 position-relative">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
            </div>
            <div class="col-md-6 mb-3 text-end">
                    <div class="g-recaptcha" data-sitekey="<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></div>
                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>

        <p class="register-link">Belum punya akun? <a href="<?php echo e(route('register')); ?>" class="text-primary fw-bold">Daftar di sini</a></p>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function togglePassword(fieldId, iconId) {
        let field = document.getElementById(fieldId);
        let icon = document.getElementById(iconId);
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/auth/login.blade.php ENDPATH**/ ?>