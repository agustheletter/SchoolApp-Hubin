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
        Schema::create('tbl_usaha_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->text('deskripsi_usaha');
            $table->string('kontak_usaha');
            $table->string('alamat_usaha');
            $table->string('kategori_usaha');
            $table->string('sosmed_usaha')->nullable();
            $table->string('gambar_usaha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usaha_siswa');
    }
};
