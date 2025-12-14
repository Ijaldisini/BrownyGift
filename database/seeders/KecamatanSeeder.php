<?php

namespace Database\Seeders;

use App\Models\kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        DB::table('kecamatan')->insert([
            ['nama_kecamatan' => 'Ajung', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Ambulu', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Arjasa', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Balung', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Bangsalsari', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Gumukmas', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Jelbuk', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Jenggawah', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Jombang', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Kalisat', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Kaliwates', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Kencong', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Ledokombo', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Mayang', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Mumbulsari', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Pakusari', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Panti', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Patrang', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Puger', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Rambipuji', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Semboro', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Silo', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Sukorambi', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Sukowono', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Sumberbaru', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Sumberjambe', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Sumbersari', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Tanggul', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Tempurejo', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Umbulsari', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Wuluhan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
