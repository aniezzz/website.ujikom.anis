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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('kategori');
        $table->string('judul');
        $table->string('penulis')->default('Admin');
        $table->date('tanggal');
        $table->text('ringkasan');
        $table->longText('isi')->nullable();
        $table->json('gambar');
        $table->boolean('is_featured')->default(false);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
