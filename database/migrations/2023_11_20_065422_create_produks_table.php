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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();

            $table->string('nama_produk', 100)->unique();

            $table->unsignedBigInteger('nama_umkm');
            $table->foreign('nama_umkm')->references('id')->on('umkms')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('kategori_produk');
            $table->foreign('kategori_produk')->references('id')->on('kategori_produks')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('harga');
            $table->text('deskripsi');
            $table->text('gambar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
