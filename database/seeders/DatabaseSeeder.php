<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            RoleSeeder::class,
            Usersseeder::class,
            MetodePembayaranSeeder::class,
            StatusPembayaranSeeder::class,
            StatusPemesananSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            StoreSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class
        ]);
    }
}
