<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Application; // Model untuk pendaftaran magang
use App\Models\Task; // Model untuk tugas
use App\Models\Upload; // Model untuk file upload

class PembimbingController extends Controller
{
    public function dashboard()
    {
        // Ambil user yang sedang login (pembimbing)
        $pembimbing = Auth::user();

        // Ambil user yang memiliki peran "user" (peserta magang)
        $users = User::where('role', 'user')->get();

        // Ambil semua aplikasi magang yang diajukan oleh peserta
        $applications = Application::with('user')->get();

        // Ambil semua tugas yang sudah dikerjakan oleh peserta
        $tasks = Task::with('user')->get();

        // Ambil data upload berdasarkan user_id
        $uploads = Upload::all()->keyBy('user_id');
        
        return view('dashboard.pembimbing', compact('pembimbing', 'users', 'applications', 'tasks', 'uploads'));
    }
}
