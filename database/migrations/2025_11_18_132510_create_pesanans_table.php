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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_alamat');
            $table->foreign('id_alamat')->references('id_alamat')->on('alamat')->onDelete('cascade');
            $table->unsignedBigInteger('id_metode_pembayaran');
            $table->foreign('id_metode_pembayaran')->references('id_metode_pembayaran')->on('metode_pembayaran')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_pembayaran');
            $table->foreign('id_status_pembayaran')->references('id_status_pembayaran')->on('status_pembayaran')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_pemesanan');
            $table->foreign('id_status_pemesanan')->references('id_status_pemesanan')->on('status_pemesanan')->onDelete('cascade');
            $table->integer('total');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('catatan')->nullable();
            $table->dateTime('tanggal_pemesanan');
            $table->dateTime('tanggal_pengambilan') -> nullable();
            $table->dateTime('tanggal_konfirmasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
