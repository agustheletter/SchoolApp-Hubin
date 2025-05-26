<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LokerModel extends Model
{
    use HasFactory, SoftDeletes;

    // Set the table name if not default
    protected $table = 'tbl_loker';

    // Fillable fields for mass assignment
    protected $fillable = [
        'perusahaan_id',
        'judul_loker',
        'deskripsi_loker',
        'posisi',
        'tanggal_dibuka',
        'tanggal_ditutup',
        'status',
    ];

    // Cast date fields to Carbon instances
    protected $dates = [
        'tanggal_dibuka',
        'tanggal_ditutup',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship: Loker belongs to Perusahaan
     */
    public function perusahaan()
    {
        return $this->belongsTo(PerusahaanModel::class, 'perusahaan_id');
    }
}
