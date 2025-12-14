<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil id kategori berdasarkan nama_kategori
        $kategori = DB::table('kategori')
            ->pluck('id_kategori', 'nama_kategori');

        DB::table('produk')->insert([
            [
                'nama_produk' => 'Graduation Bouquet Pocky with Doll',
                'deskripsi_produk' => 'Buket khusus untuk acara wisuda yang dilengkapi dengan boneka lucu dan Pocky',
                'harga_produk' => 80000,
                'stok_produk' => 2,
                'id_kategori' => $kategori['Graduation'],
                'gambar_produk' => 'Graduation.jpg'
            ],
            [
                'nama_produk' => 'Big Black Satin Ribbon Bouquet',
                'deskripsi_produk' => 'Buket dengan bahan pita satin hitam besar yang elegan',
                'harga_produk' => 120000,
                'stok_produk' => 2,
                'id_kategori' => $kategori['Pita Satin'],
                'gambar_produk' => 'Pita Satin Hitam.jpg'
            ],
            [
                'nama_produk' => 'Small Black Satin Ribbon Bouquet',
                'deskripsi_produk' => 'Buket dengan bahan pita satin hitam kecil yang elegan',
                'harga_produk' => 100000,
                'stok_produk' => 2,
                'id_kategori' => $kategori['Pita Satin'],
                'gambar_produk' => 'Pita Satin Hitam Kecil.jpg'
            ],
            [
                'nama_produk' => 'Snack Bouquet Wafello & Pocky',
                'deskripsi_produk' => 'Buket dengan snack Wafello dan Pocky yang lezat',
                'harga_produk' => 50000,
                'stok_produk' => 2,
                'id_kategori' => $kategori['Snack'],
                'gambar_produk' => 'Snack Wafelo dan Pocky.jpg'
            ],
        ]);
    }
}
