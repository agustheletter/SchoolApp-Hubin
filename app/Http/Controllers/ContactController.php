<?php
// File: app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Menyimpan pesan dari form kontak yang ada di halaman utama.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        // Jika validasi gagal, kembalikan ke halaman utama ke section #kontak
        // dengan pesan error dan input yang sudah diisi.
        if ($validator->fails()) {
            return redirect('/#kontak') // <-- Perubahan di sini
                        ->withErrors($validator)
                        ->withInput();
        }

        // Logika untuk mengirim email atau menyimpan ke database bisa ditambahkan di sini

        // Redirect kembali ke halaman utama ke section #kontak dengan pesan sukses
        return redirect('/') // <-- Perubahan di sini
                     ->with('success', 'Pesan Terkirim! Terima kasih telah menghubungi kami.');
    }
}