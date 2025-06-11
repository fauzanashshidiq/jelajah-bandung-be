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
    Schema::table('paket_wisatas', function (Blueprint $table) {
        $table->integer('durasi_paket')->change();
    });
}

public function down(): void
{
    Schema::table('paket_wisatas', function (Blueprint $table) {
        $table->string('durasi_paket')->change();
    });
}

};
