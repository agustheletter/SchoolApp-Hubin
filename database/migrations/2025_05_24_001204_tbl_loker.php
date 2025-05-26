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
        //
        Schema::create('tbl_loker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('tbl_perusahaan')->onDelete('cascade');
            $table->string('judul_loker');
            $table->text('deskripsi_loker');
            $table->string('posisi');
            $table->date('tanggal_dibuka');
            $table->date('tanggal_ditutup');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_loker');
    }
};
