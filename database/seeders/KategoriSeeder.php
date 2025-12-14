<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
        ['nama_kategori' => 'Birthday'],
        ['nama_kategori' => 'Graduation'],
        ['nama_kategori' => 'Snack'],
        ['nama_kategori' => 'Roses'],
        ['nama_kategori' => 'Fresh Flowers'],
        ['nama_kategori' => 'Money'],
        ['nama_kategori' => 'Pipe Cleaner'],
        ['nama_kategori' => 'Pita Satin']
       ]);
    }
}
