<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsahaSiswaModel extends Model
{
    protected $table = 'tbl_usaha_siswa';

    // Jika kamu tidak menggunakan auto-increment id
    protected $primaryKey = 'id';

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'nama_usaha',
        'pemilik_usaha',
        'deskripsi_usaha',
        'kontak_usaha',
        'alamat_usaha',
        'kategori_usaha',
        'sosmed_usaha',
        'gambar_usaha',
    ];
}
