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
        Schema::create('tbl_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("alamat");
            $table->string("kontak");
            $table->string("email");
            $table->string("website")->nullable();
            $table->string("deskripsi");
            $table->string("bidang_kerja");
            $table->string("logo");
            $table->enum("status", ["aktif", "nonaktif"])->default("aktif");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_perusahaan');
    }
};
