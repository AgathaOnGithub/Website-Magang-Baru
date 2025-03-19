<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Menampilkan daftar file yang diunggah user
    public function indexUser()
    {
        $uploads = Upload::where('user_id', Auth::id())->get();
        return view('user.uploads.index', compact('uploads'));
    }

    // Menampilkan file yang diunggah oleh peserta magang
    public function show($id)
    {
        $upload = Upload::findOrFail($id);
        return response()->file(storage_path('app/' . $upload->file_path));
    }

    // User mengunggah CV dan Formulir
    public function storeUser(Request $request)
    {
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'formulir' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $upload = Upload::where('user_id', Auth::id())->first();

        if (!$upload) {
            $upload = new Upload();
            $upload->user_id = Auth::id();
        }

        if ($request->hasFile('cv')) {
            // Hapus file lama jika ada
            if ($upload->cv) {
                Storage::delete($upload->cv);
            }
            $upload->cv = $request->file('cv')->store('uploads/cv');
        }

        if ($request->hasFile('formulir')) {
            if ($upload->formulir) {
                Storage::delete($upload->formulir);
            }
            $upload->formulir = $request->file('formulir')->store('uploads/formulir');
        }

        $upload->save();

        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }

    // Pembimbing mengunggah dokumen peserta
    public function storePembimbing(Request $request)
    {
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'formulir' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'peserta_id' => 'required|exists:users,id',
        ]);

        $upload = Upload::where('user_id', $request->peserta_id)->first();

        if (!$upload) {
            $upload = new Upload();
            $upload->user_id = $request->peserta_id;
        }

        if ($request->hasFile('cv')) {
            if ($upload->cv) {
                Storage::delete($upload->cv);
            }
            $upload->cv = $request->file('cv')->store('uploads/cv');
        }

        if ($request->hasFile('formulir')) {
            if ($upload->formulir) {
                Storage::delete($upload->formulir);
            }
            $upload->formulir = $request->file('formulir')->store('uploads/formulir');
        }

        $upload->save();

        return redirect()->route('pembimbing.uploads.index')->with('success', 'File berhasil diunggah oleh Pembimbing.');
    }

    // Menghapus file yang diunggah user sendiri
    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);

        if ($upload->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus file ini.');
        }

        if ($upload->cv) {
            Storage::delete($upload->cv);
        }
        if ($upload->formulir) {
            Storage::delete($upload->formulir);
        }

        $upload->delete();

        return redirect()->route('uploads.indexUser')->with('success', 'File berhasil dihapus.');
    }
}
