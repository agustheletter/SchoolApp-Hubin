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
        Schema::create('tbl_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kunjungan');
            $table->foreignId('perusahaan_id')->constrained('tbl_perusahaan')->onDelete('cascade');
            $table->enum('jenis_kunjungan', ['ke_sekolah', 'ke_perusahaan'])->default('ke_perusahaan');
            $table->string('alamat_kunjungan');
            $table->date('tanggal_kunjungan');
            $table->enum('status', ['planned', 'completed', 'canceled'])->default('planned');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kunjungan');
    }
};
