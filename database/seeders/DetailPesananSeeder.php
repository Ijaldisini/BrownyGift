<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPesananSeeder extends Seeder
{
    public function run(): void
    {
        $pesananIds = DB::table('pesanan')->pluck('id_pesanan')->toArray();
        $produkIds = DB::table('produk')->pluck('id_produk')->toArray();

        if (empty($produkIds)) {
            $this->command->warn("Tabel produk kosong. Isi dulu tabel produk.");
            return;
        }

        foreach ($pesananIds as $idPesanan) {
            $jumlahItem = rand(1, 3);
            $total = 0;

            for ($i = 0; $i < $jumlahItem; $i++) {
                $produkId = $produkIds[array_rand($produkIds)];
                $qty = rand(1, 5);

                DB::table('detail_pesanan')->insert([
                    'id_pesanan' => $idPesanan,
                    'id_produk' => $produkId,
                    'quantity_per_produk' => $qty,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // estimasi harga biar masuk akal
                $total += $qty * rand(15000, 50000);
            }

            // update total pesanan
            DB::table('pesanan')
                ->where('id_pesanan', $idPesanan)
                ->update(['total' => $total]);
        }
    }
}
