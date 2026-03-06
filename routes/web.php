<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ContactController;

// --- HALAMAN UTAMA ---
Route::get('/', [TodoController::class, 'index'])->name('todo.index');

// --- RESOURCE TO-DO ---

// 1. Tampilkan Halaman Tambah (PENTING: Ini yang tadi kurang)
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');

// 2. Proses Simpan Data Baru
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

// 3. Update Status (Checkbox Done/Pending)
Route::patch('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');

// 4. Hapus Data
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

// --- ROUTE EDIT & UPDATE DATA ---

// 5. Tampilkan Halaman Edit
Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');

// 6. Proses Update Data (Hasil dari Form Edit)
Route::put('/todo/{id}/update', [TodoController::class, 'update_data'])->name('todo.update_data');

// --- RESOURCE CONTACT ---
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Menampilkan halaman form tambah
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');

// Memproses penyimpanan data
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');