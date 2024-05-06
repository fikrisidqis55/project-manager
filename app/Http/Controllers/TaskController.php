<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project; // Perhatikan tambahan ini

class TaskController extends Controller
{
    public function store(Request $request, Project $project) // Perhatikan tambahan parameter Project $project
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project->tasks()->create([
            'name' => $request->name,
            'status' => false, // Default status saat menambahkan tugas
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan');
    }

    public function update(Task $task)
    {
        $task->update(['status' => true]);
        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui');
    }
}
