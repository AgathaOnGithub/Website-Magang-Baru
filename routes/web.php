<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

// **🏠 Halaman Utama**
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('home');
})->name('home');

// **🔒 Routes untuk tamu (Guest)**
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// **🔓 Logout (Hanya untuk User yang sudah login)**
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// **📌 Informasi Umum**
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');

// **📢 Program Magang (Dapat diakses tanpa login)**
Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/internships/{id}', [InternshipController::class, 'show'])->name('internships.show');

// **🔐 Routes setelah login**
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // **👤 Routes untuk User**
    Route::prefix('user')->middleware('role:user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

        // 📝 Pendaftaran Program Magang
        Route::get('/internships/{id}/register', [InternshipController::class, 'register'])->name('internships.register');
        Route::post('/internships/{id}/register', [InternshipController::class, 'submitRegistration'])->name('internships.submit');

        // 🔼 Upload Dokumen oleh User
        Route::post('/internships/{id}/uploadResume', [InternshipController::class, 'uploadResume'])->name('internships.uploadResume');
        Route::post('/internships/{id}/uploadCv', [InternshipController::class, 'uploadCv'])->name('internships.uploadCv');
        Route::post('/internships/{id}/uploadGrades', [InternshipController::class, 'uploadGrades'])->name('internships.uploadGrades');
        Route::post('/internships/{id}/uploadApproval', [InternshipController::class, 'uploadApproval'])->name('internships.uploadApproval');

        // 💬 Menambahkan Komentar pada Program Magang
        Route::post('/internships/{id}/addComment', [InternshipController::class, 'addComment'])->name('internships.addComment');

        // 🔼 Upload Dokumen oleh User
        Route::post('/uploads', [UploadController::class, 'storeUser'])->name('uploads.storeUser');

    });

    // **🎓 Routes untuk Pembimbing**
    Route::prefix('pembimbing')->middleware('role:pembimbing')->group(function () {
        Route::get('/dashboard', [PembimbingController::class, 'dashboard'])->name('pembimbing.dashboard');

        // 🔄 Profil Pembimbing
        Route::get('/profile', [PembimbingController::class, 'profile'])->name('pembimbing.profile');
        Route::put('/profile/update', [PembimbingController::class, 'updateProfile'])->name('pembimbing.profile.update');

        // 📌 Manajemen Tugas
        Route::get('/tasks', [TaskController::class, 'index'])->name('pembimbing.tasks.index');
        Route::put('/tasks/{task}/review', [TaskController::class, 'review'])->name('pembimbing.tasks.review');

        // 🔼 Upload Dokumen oleh Pembimbing
        Route::post('/uploads', [UploadController::class, 'storePembimbing'])->name('uploads.storePembimbing');
        
        // ❌ Manajemen User
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    });

    // **🛠️ Routes untuk Admin**
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // 🔧 CRUD Program Magang
        Route::resource('internships', InternshipController::class)->except(['index', 'show']);
        
        // 🗑️ Menghapus program magang
        Route::delete('/internships/{id}', [InternshipController::class, 'destroy'])->name('internships.destroy');
    });

    // **📑 Manajemen Tugas untuk Semua Pengguna**
    Route::resource('tasks', TaskController::class);

    // **👀 Pratinjau Dokumen (CV, Resume, dan Formulir)**
    Route::get('/preview/{filename}', function ($filename) {
        $path = storage_path("app/public/uploads/{$filename}");

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    })->name('preview.pdf');
    
    Route::get('/tasks/preview/{filename}', function ($filename) {
        $filePath = storage_path("app/public/uploads/{$filename}");

        if (!file_exists($filePath)) {
            abort(404);
        }

        return Response::file($filePath, [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => 'inline',
        ]);
    })->name('tasks.preview');
});
