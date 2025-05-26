<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengumumanModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pengumuman';

    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'gambar',
        'kategori',
        'tanggal_pengumuman',
        'tanggal_berakhir',
        'lokasi',
        'kontak_email',
        'kontak_telepon',
        'lampiran',
        'berkas_dibutuhkan',
        'persyaratan',
        'posisi'
    ];

    protected $casts = [
        'berkas_dibutuhkan' => 'array',
        'persyaratan' => 'array',
        'posisi' => 'array',
    ];

    protected $dates = [
        'tanggal_pengumuman',
        'tanggal_berakhir',
        'deleted_at',
    ];
}
