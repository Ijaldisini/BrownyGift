<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        // Buat pesanan dalam 2 bulan terakhir
        for ($i = 1; $i <= 15; $i++) {
            $tanggal = Carbon::now()->subDays(rand(1, 45));

            $data[] = [
                'id_user' => 1,
                'id_alamat' => 1,
                'id_metode_pembayaran' => rand(1, 2),
                'id_status_pembayaran' => 2, // Lunas
                'id_status_pemesanan' => 3, // Selesai
                'total' => 0, // nanti dihitung dari detail
                'bukti_pembayaran' => 'bukti' . $i . '.jpg',
                'catatan' => null,
                'tanggal_pemesanan' => $tanggal,
                'tanggal_konfirmasi' => $tanggal->copy()->addHours(1),
                'tanggal_pengambilan' => $tanggal->copy()->addDays(1),
            ];
        }

        DB::table('pesanan')->insert($data);
    }
}
