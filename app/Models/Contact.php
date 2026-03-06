<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Tambahkan baris ini agar kolom nama dan pesan bisa diisi
    protected $fillable = ['nama', 'pesan'];
}