<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi agar data tidak kosong
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
        ]);

        // Simpan data ke tabel contacts
        Contact::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);

        return response()->json(['success' => 'Pesan berhasil masuk ke database!']);
    }
}