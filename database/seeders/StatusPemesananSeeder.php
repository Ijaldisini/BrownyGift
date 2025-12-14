<?php

namespace Database\Seeders;

use App\Models\status_pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusPemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pemesanan')->insert([
            ['status_pemesanan' => 'menunggu pembayaran'],
            ['status_pemesanan' => 'menunggu konfirmasi'],
            ['status_pemesanan' => 'diproses'],
            ['status_pemesanan' => 'dikirim'],
            ['status_pemesanan' => 'selesai'],
            ['status_pemesanan' => 'dibatalkan']
        ]);
    }
}
