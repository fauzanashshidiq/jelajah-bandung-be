<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonisTable extends Migration
{
    public function up(): void
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id('id_testimoni');
            $table->string('nama_pengguna');
            $table->text('isi');
            $table->string('foto')->nullable(); // Foto testimoni, boleh kosong
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
}
