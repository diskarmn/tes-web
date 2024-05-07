<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('hasil_responses', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('jenis_kelamin')->nullable();
        $table->string('nama')->nullable();
        $table->string('nama_jalan')->nullable();
        $table->string('email')->nullable();
        $table->integer('angka_kurang')->nullable();
        $table->integer('angka_lebih')->nullable();
        $table->unsignedBigInteger('profesi')->nullable();
        $table->text('plain_json')->nullable();
        $table->timestamps();

        $table->foreign('jenis_kelamin')->references('id')->on('jenis_kelamin');
        $table->foreign('profesi')->references('id')->on('tabel_profesi');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_responses');
    }
};
