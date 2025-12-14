<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::truncate();

        Store::create([
            'nama_toko'    => 'BrownyGift',
            'deskripsi'    => 'Rangkaian buket bunga segar dan aesthetic untuk wisuda, ulang tahun, hingga momen romantis.',
            'tentang_kami' => 'BrownyGift berawal dari kecintaan kami pada keindahan bunga. Kami percaya setiap tangkai bunga memiliki makna mendalam untuk setiap perasaan yang ingin disampaikan.',
        ]);
    }
}
