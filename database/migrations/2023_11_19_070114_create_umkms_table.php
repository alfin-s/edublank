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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();

            $table->string('nama_umkm', 100)->unique();

            $table->unsignedBigInteger('kategori_umkm');
            $table->foreign('kategori_umkm')->references('id')->on('kategori_umkms')->onDelete('cascade')->onUpdate('cascade');

            $table->text('deskripsi');
            $table->bigInteger('no_telp');
            $table->string('link_web', 100);
            $table->string('link_instagram', 100);
            $table->string('link_maps', 100);
            $table->text('logo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
