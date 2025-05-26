<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pengumuman');
            $table->text('isi_pengumuman');
            $table->string('gambar')->nullable();
            $table->string('kategori')->nullable();
            $table->date('tanggal_pengumuman')->default(now());
            $table->date('tanggal_berakhir')->nullable();

            $table->string('lokasi')->nullable();
            $table->string('kontak_email')->nullable();
            $table->string('kontak_telepon')->nullable();
            $table->string('lampiran')->nullable();
            $table->json('berkas_dibutuhkan')->nullable();
            $table->json('persyaratan')->nullable();
            $table->json('posisi')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengumuman');
    }
};
