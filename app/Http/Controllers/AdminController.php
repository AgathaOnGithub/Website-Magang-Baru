<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan hanya admin yang bisa mengakses
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        // Ambil data internships beserta relasi applicants
        $internships = Internship::with('applicants')->get();

        // Ambil semua user
        $users = User::all();

        // Ambil user dengan role 'mentor'
        $mentors = User::where('role', 'mentor')->get();

        return view('admin.dashboard', compact('internships', 'users', 'mentors'));
    }
}