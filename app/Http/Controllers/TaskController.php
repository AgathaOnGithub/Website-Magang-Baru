<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        // Pastikan setiap file memiliki URL yang benar
        foreach ($tasks as $task) {
            $task->file_url = asset('storage/' . $task->file_path);
        }

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'file' => 'required|mimes:pdf,docx,jpg,png|max:2048',
        ]);

        // Simpan file ke storage/app/public/uploads
        $filePath = $request->file('file')->store('uploads', 'public');

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf,docx,jpg,png|max:2048'
        ]);

        $task->title = $request->title;
        $task->description = $request->description;

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($task->file_path) {
                Storage::disk('public')->delete($task->file_path);
            }

            // Simpan file baru
            $filePath = $request->file('file')->store('uploads', 'public');
            $task->file_path = $filePath;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if ($task->file_path) {
            Storage::disk('public')->delete($task->file_path);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }

    public function showFile($filename)
    {
        $filePath = storage_path("app/public/uploads/{$filename}");

        if (!file_exists($filePath)) {
            abort(404);
        }

        return Response::file($filePath, [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}

