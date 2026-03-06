<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        $total_tugas = $todos->count();
        $total_pending = $todos->where('is_done', 0)->count();
        $total_selesai = $todos->where('is_done', 1)->count();

        return view('home', compact('todos', 'total_tugas', 'total_pending', 'total_selesai'));
    }

    // Menampilkan halaman TAMBAH.blade.php
    public function create()
    {
        return view('tambah'); 
    }

public function store(Request $request) 
{
    $request->validate([
        'judul' => 'required',
        'deadline' => 'required' 
    ]);

    Todo::create([
        'judul' => $request->judul,
        'keterangan' => $request->keterangan,
        'deadline' => $request->deadline, 
        // Cek jika checkbox "is_done" ada di request
        'is_done' => $request->has('is_done'), 
        'tanggal_selesai' => $request->has('is_done') ? now() : null
    ]);

    return redirect()->route('todo.index')->with('success', 'Tugas berhasil ditambahkan!');
}
    public function update(Request $request, $id) 
    {
        $todo = Todo::findOrFail($id);
        
        $isDone = $request->has('is_done');
        
        $todo->update([
            'is_done' => $isDone,
            'tanggal_selesai' => $isDone ? Carbon::now() : null
        ]);

        return back()->with('success', $isDone ? 'Task Finished!' : 'Task set to Pending');
    }

    public function update_data(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deadline' => 'required',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('todo.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy($id) 
    {
        Todo::findOrFail($id)->delete();
        return back()->with('success', 'Task Deleted!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit', compact('todo')); 
    }
}