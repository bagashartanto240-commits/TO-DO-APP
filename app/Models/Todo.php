<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // Ini wajib agar data dari form bisa masuk ke database
    protected $fillable = ['judul', 'keterangan', 'is_done', 'tanggal_selesai'];
}