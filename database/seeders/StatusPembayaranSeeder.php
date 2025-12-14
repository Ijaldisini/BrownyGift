<?php

namespace Database\Seeders;

use App\Models\status_pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pembayaran')->insert([
            ['status_pembayaran' => 'Belum Lunas'],
            ['status_pembayaran' => 'Lunas']
        ]);
    }
}
