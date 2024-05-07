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
        Schema::create('tabel_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kategori')->nullable();
            $table->string('kd_satuan')->nullable();
            $table->string('kode_barang')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->integer('jumlah')->nullable();
            $table->unsignedBigInteger('id_user_insert')->nullable();
            $table->timestamps();

            $table->foreign('kd_kategori')->references('kode')->on('tabel_kategori_barang');
            $table->foreign('kd_satuan')->references('kode')->on('tabel_satuan_barang');
            $table->foreign('id_user_insert')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_barang');
    }
};
