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
    Schema::create('paket_wisatas', function (Blueprint $table) {
        $table->id('id_paket');
        $table->string('nama_paket');
        $table->text('deskripsi_paket');
        $table->string('durasi_paket');
        $table->string('gambar_paket');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_wisatas');
    }
};
