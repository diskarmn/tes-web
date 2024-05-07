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
        Schema::create('tabel_profesi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_profesi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabel_profesi');
    }
};
