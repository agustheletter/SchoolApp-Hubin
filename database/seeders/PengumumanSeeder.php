<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_pengumuman')->insert([
            [
                'judul_pengumuman' => 'Lowongan Kerja Staff Administrasi',
                'isi_pengumuman' => 'Kami membuka lowongan kerja untuk posisi Staff Administrasi di perusahaan XYZ.',
                'gambar' => null,
                'kategori' => 'Lowongan Kerja',
                'tanggal_pengumuman' => now(),
                'tanggal_berakhir' => now()->addDays(14),
                'lokasi' => 'Jakarta',
                'kontak_email' => 'hrd@xyz.co.id',
                'kontak_telepon' => '081234567890',
                'lampiran' => null,
                'berkas_dibutuhkan' => json_encode(['KTP', 'CV', 'Ijazah']),
                'persyaratan' => json_encode(['WNI', 'Usia 21-30 tahun', 'Pendidikan minimal D3']),
                'posisi' => json_encode(['Staff Administrasi']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul_pengumuman' => 'Seminar Nasional Kewirausahaan 2025',
                'isi_pengumuman' => 'Ayo ikuti seminar kewirausahaan dengan pembicara nasional dan pelaku UMKM sukses!',
                'gambar' => null,
                'kategori' => 'Seminar',
                'tanggal_pengumuman' => now(),
                'tanggal_berakhir' => now()->addDays(30),
                'lokasi' => 'Universitas ABC, Bandung',
                'kontak_email' => 'seminar@abc.ac.id',
                'kontak_telepon' => '089876543210',
                'lampiran' => null,
                'berkas_dibutuhkan' => json_encode(['Bukti Pendaftaran']),
                'persyaratan' => json_encode(['Mahasiswa aktif', 'Pendaftaran sebelum 15 Juni']),
                'posisi' => json_encode([]), // Tidak relevan untuk seminar
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
