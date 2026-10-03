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
    Schema::create('program_keahlians', function (Blueprint $table) {
        $table->id();
        $table->string('kategori');
        $table->string('nama');
        $table->string('gambar');
        $table->text('deskripsi');
        $table->json('kompetensi');
        $table->json('prospek_karir');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_keahlians');
    }
};
