<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Controller untuk mengelola Task (Tugas)
 */
class TaskController extends Controller
{
    /**
     * Menampilkan daftar semua tugas
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Menampilkan form untuk membuat tugas baru
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Menyimpan tugas baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'deadline' => 'nullable|date',
        ]);

        // Simpan tugas baru
        Task::create($request->all());
        return redirect()->route('task.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit tugas
     */
    public function edit($id)
    {
        // Cari tugas berdasarkan ID
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    /**
     * Memperbarui data tugas di database
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'deadline' => 'nullable|date',
        ]);

        // Update tugas yang dipilih
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('task.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Menghapus tugas dari database
     */
    public function destroy($id)
    {
        // Cari dan hapus tugas
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
