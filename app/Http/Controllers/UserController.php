<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $upload = Upload::where('user_id', $user->id)->first();

        return view('dashboard.user', compact('user', 'upload'));
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id != $user->id && auth()->user()->role !== 'admin') {
            abort(403, 'Tidak memiliki izin untuk melihat profil ini.');
        }

        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id != $user->id && auth()->user()->role !== 'admin') {
            abort(403, 'Tidak memiliki izin untuk mengedit profil ini.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('profile.view', $user->id)->with('success', 'Profil berhasil diperbarui.');
    }

   public function storeUser(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,docx|max:2048',
            'formulir' => 'required|mimes:pdf,docx|max:2048',
        ]);

        // Simpan file ke storage
        $cvPath = $request->file('cv')->store('uploads', 'public');
        $formulirPath = $request->file('formulir')->store('uploads', 'public');

        // Simpan data ke database
        Upload::create([
            'user_id' => Auth::id(),
            'cv' => $cvPath,
            'formulir' => $formulirPath,
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diupload.');
    }
}
