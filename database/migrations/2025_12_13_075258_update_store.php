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
        Schema::table('store', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->text('tentang_kami')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store', function (Blueprint $table) {
            $table->enum('status', ['buka', 'tutup'])->default('buka');
            $table->dropColumn('tentang_kami');
        });
    }
};
