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
        Schema::create('alamat', function (Blueprint $table) {
            $table->id('id_alamat');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_kecamatan');
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan')->onDelete('cascade');
            $table->unsignedBigInteger('id_desa');
            $table->foreign('id_desa')->references('id_desa')->on('desa')->onDelete('cascade');
            $table->string('detail_alamat');
            $table->string('nama_penerima');
            $table->string('no_hp_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamats');
    }
};
