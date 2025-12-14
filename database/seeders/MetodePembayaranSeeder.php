<?php

namespace Database\Seeders;

use App\Models\metode_pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pembayaran')->insert([
            ['metode_pembayaran' => 'Transfer Bank'],
            ['metode_pembayaran' => 'COD']
        ]);
    }
}
