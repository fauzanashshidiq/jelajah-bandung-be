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
    Schema::create('hargas', function (Blueprint $table) {
        $table->id('id_harga');
        $table->integer('peserta');
        $table->decimal('harga_per_peserta', 8, 2);
        $table->unsignedBigInteger('id_paket');
        $table->timestamps();

        $table->foreign('id_paket')->references('id_paket')->on('paket_wisatas')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargas');
    }
};
