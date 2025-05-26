<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerusahaanModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_perusahaan';

    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'email',
        'website',
        'deskripsi',
        'bidang_kerja',
        'logo',
        'status',
    ];

    // Tanggal yang harus dianggap sebagai instance Carbon
    protected $dates = ['deleted_at'];

    // Jika kamu ingin menambahkan casting data:
    protected $casts = [
        'status' => 'string',
    ];

    public function lokers()
    {
        return $this->hasMany(LokerModel::class, 'perusahaan_id');
    }
}
