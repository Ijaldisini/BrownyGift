<?php

namespace Database\Seeders;

use App\Models\desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('desa')->insert([

            // 1. Ajung
            ['id_kecamatan' => 1, 'nama_desa' => 'Ajung', 'ongkir' => 10000],
            ['id_kecamatan' => 1, 'nama_desa' => 'Klompangan', 'ongkir' => 10000],
            ['id_kecamatan' => 1, 'nama_desa' => 'Patemon', 'ongkir' => 10000],
            ['id_kecamatan' => 1, 'nama_desa' => 'Wirolegi', 'ongkir' => 10000],

            // 2. Ambulu
            ['id_kecamatan' => 2, 'nama_desa' => 'Ambulu', 'ongkir' => 10000],
            ['id_kecamatan' => 2, 'nama_desa' => 'Andongsari', 'ongkir' => 10000],
            ['id_kecamatan' => 2, 'nama_desa' => 'Pontang', 'ongkir' => 10000],
            ['id_kecamatan' => 2, 'nama_desa' => 'Sabrang', 'ongkir' => 10000],
            ['id_kecamatan' => 2, 'nama_desa' => 'Tanjungrejo', 'ongkir' => 10000],
            ['id_kecamatan' => 2, 'nama_desa' => 'Pecoro', 'ongkir' => 10000],

            // 3. Arjasa
            ['id_kecamatan' => 3, 'nama_desa' => 'Arjasa', 'ongkir' => 10000],
            ['id_kecamatan' => 3, 'nama_desa' => 'Candijati', 'ongkir' => 10000],
            ['id_kecamatan' => 3, 'nama_desa' => 'Darsono', 'ongkir' => 10000],
            ['id_kecamatan' => 3, 'nama_desa' => 'Kemuning Lor', 'ongkir' => 10000],
            ['id_kecamatan' => 3, 'nama_desa' => 'Sukosari', 'ongkir' => 10000],

            // 4. Balung
            ['id_kecamatan' => 4, 'nama_desa' => 'Balung Kulon', 'ongkir' => 10000],
            ['id_kecamatan' => 4, 'nama_desa' => 'Balung Lor', 'ongkir' => 10000],
            ['id_kecamatan' => 4, 'nama_desa' => 'Curahlele', 'ongkir' => 10000],
            ['id_kecamatan' => 4, 'nama_desa' => 'Gumelar', 'ongkir' => 10000],
            ['id_kecamatan' => 4, 'nama_desa' => 'Tutul', 'ongkir' => 10000],

            // 5. Bangsalsari
            ['id_kecamatan' => 5, 'nama_desa' => 'Bangsalsari', 'ongkir' => 10000],
            ['id_kecamatan' => 5, 'nama_desa' => 'Tanggul Kulon', 'ongkir' => 10000],
            ['id_kecamatan' => 5, 'nama_desa' => 'Tanggul Wetan', 'ongkir' => 10000],
            ['id_kecamatan' => 5, 'nama_desa' => 'Karangsono', 'ongkir' => 10000],
            ['id_kecamatan' => 5, 'nama_desa' => 'Sukorejo', 'ongkir' => 10000],

            // 6. Gumukmas
            ['id_kecamatan' => 6, 'nama_desa' => 'Bagorejo', 'ongkir' => 10000],
            ['id_kecamatan' => 6, 'nama_desa' => 'Gumukmas', 'ongkir' => 10000],
            ['id_kecamatan' => 6, 'nama_desa' => 'Karangrejo', 'ongkir' => 10000],
            ['id_kecamatan' => 6, 'nama_desa' => 'Mayangan', 'ongkir' => 10000],
            ['id_kecamatan' => 6, 'nama_desa' => 'Puger Kulon', 'ongkir' => 10000],

            // 7. Jelbuk
            ['id_kecamatan' => 7, 'nama_desa' => 'Jelbuk', 'ongkir' => 10000],
            ['id_kecamatan' => 7, 'nama_desa' => 'Suco', 'ongkir' => 10000],
            ['id_kecamatan' => 7, 'nama_desa' => 'Panduman', 'ongkir' => 10000],
            ['id_kecamatan' => 7, 'nama_desa' => 'Patemon', 'ongkir' => 10000],

            // 8. Jenggawah
            ['id_kecamatan' => 8, 'nama_desa' => 'Jenggawah', 'ongkir' => 10000],
            ['id_kecamatan' => 8, 'nama_desa' => 'Sruni', 'ongkir' => 10000],
            ['id_kecamatan' => 8, 'nama_desa' => 'Wonojati', 'ongkir' => 10000],
            ['id_kecamatan' => 8, 'nama_desa' => 'Cangkring', 'ongkir' => 10000],

            // 9. Jombang
            ['id_kecamatan' => 9, 'nama_desa' => 'Jombang', 'ongkir' => 10000],
            ['id_kecamatan' => 9, 'nama_desa' => 'Kertosari', 'ongkir' => 10000],
            ['id_kecamatan' => 9, 'nama_desa' => 'Padomasan', 'ongkir' => 10000],
            ['id_kecamatan' => 9, 'nama_desa' => 'Puger Wetan', 'ongkir' => 10000],

            // 10. Kalisat
            ['id_kecamatan' => 10, 'nama_desa' => 'Kalisat', 'ongkir' => 10000],
            ['id_kecamatan' => 10, 'nama_desa' => 'Plalangan', 'ongkir' => 10000],
            ['id_kecamatan' => 10, 'nama_desa' => 'Sumber Kalong', 'ongkir' => 10000],
            ['id_kecamatan' => 10, 'nama_desa' => 'Sukoreno', 'ongkir' => 10000],
            ['id_kecamatan' => 10, 'nama_desa' => 'Sumber Jeruk', 'ongkir' => 10000],
            ['id_kecamatan' => 10, 'nama_desa' => 'Tisnogambar', 'ongkir' => 10000],

            // 11. Kaliwates (Kelurahan)
            ['id_kecamatan' => 11, 'nama_desa' => 'Kaliwates', 'ongkir' => 10000],
            ['id_kecamatan' => 11, 'nama_desa' => 'Mangli', 'ongkir' => 10000],
            ['id_kecamatan' => 11, 'nama_desa' => 'Sempusari', 'ongkir' => 10000],
            ['id_kecamatan' => 11, 'nama_desa' => 'Kebonsari', 'ongkir' => 10000],
            ['id_kecamatan' => 11, 'nama_desa' => 'Tegal Besar', 'ongkir' => 10000],

            // 12. Kencong
            ['id_kecamatan' => 12, 'nama_desa' => 'Kraton', 'ongkir' => 10000],
            ['id_kecamatan' => 12, 'nama_desa' => 'Kencong', 'ongkir' => 10000],
            ['id_kecamatan' => 12, 'nama_desa' => 'Wonorejo', 'ongkir' => 10000],
            ['id_kecamatan' => 12, 'nama_desa' => 'Paseban', 'ongkir' => 10000],

            // 13. Ledokombo
            ['id_kecamatan' => 13, 'nama_desa' => 'Ledokombo', 'ongkir' => 10000],
            ['id_kecamatan' => 13, 'nama_desa' => 'Sukogidri', 'ongkir' => 10000],
            ['id_kecamatan' => 13, 'nama_desa' => 'Slateng', 'ongkir' => 10000],
            ['id_kecamatan' => 13, 'nama_desa' => 'Sumbersalak', 'ongkir' => 10000],

            // 14. Mayang
            ['id_kecamatan' => 14, 'nama_desa' => 'Mayang', 'ongkir' => 10000],
            ['id_kecamatan' => 14, 'nama_desa' => 'Mrawan', 'ongkir' => 10000],
            ['id_kecamatan' => 14, 'nama_desa' => 'Tegal Waru', 'ongkir' => 10000],
            ['id_kecamatan' => 14, 'nama_desa' => 'Sumberjati', 'ongkir' => 10000],

            // 15. Mumbulsari
            ['id_kecamatan' => 15, 'nama_desa' => 'Mumbulsari', 'ongkir' => 10000],
            ['id_kecamatan' => 15, 'nama_desa' => 'Kawangrejo', 'ongkir' => 10000],
            ['id_kecamatan' => 15, 'nama_desa' => 'Karang Anyar', 'ongkir' => 10000],
            ['id_kecamatan' => 15, 'nama_desa' => 'Tamansari', 'ongkir' => 10000],

            // 16. Pakusari
            ['id_kecamatan' => 16, 'nama_desa' => 'Pakusari', 'ongkir' => 10000],
            ['id_kecamatan' => 16, 'nama_desa' => 'Sukorenggo', 'ongkir' => 10000],
            ['id_kecamatan' => 16, 'nama_desa' => 'Subo', 'ongkir' => 10000],
            ['id_kecamatan' => 16, 'nama_desa' => 'Baban', 'ongkir' => 10000],

            // 17. Panti
            ['id_kecamatan' => 17, 'nama_desa' => 'Panti', 'ongkir' => 10000],
            ['id_kecamatan' => 17, 'nama_desa' => 'Suci', 'ongkir' => 10000],
            ['id_kecamatan' => 17, 'nama_desa' => 'Kebonagung', 'ongkir' => 10000],
            ['id_kecamatan' => 17, 'nama_desa' => 'Glagahwero', 'ongkir' => 10000],

            // 18. Patrang
            ['id_kecamatan' => 18, 'nama_desa' => 'Jember Kidul', 'ongkir' => 10000],
            ['id_kecamatan' => 18, 'nama_desa' => 'Jember Lor', 'ongkir' => 10000],
            ['id_kecamatan' => 18, 'nama_desa' => 'Bintoro', 'ongkir' => 10000],
            ['id_kecamatan' => 18, 'nama_desa' => 'Slawu', 'ongkir' => 10000],

            // 19. Puger
            ['id_kecamatan' => 19, 'nama_desa' => 'Puger Kulon', 'ongkir' => 10000],
            ['id_kecamatan' => 19, 'nama_desa' => 'Puger Wetan', 'ongkir' => 10000],
            ['id_kecamatan' => 19, 'nama_desa' => 'Kasiyan Timur', 'ongkir' => 10000],
            ['id_kecamatan' => 19, 'nama_desa' => 'Kasiyan Barat', 'ongkir' => 10000],
            ['id_kecamatan' => 19, 'nama_desa' => 'Mlokorejo', 'ongkir' => 10000],

            // 20. Rambipuji
            ['id_kecamatan' => 20, 'nama_desa' => 'Rambipuji', 'ongkir' => 10000],
            ['id_kecamatan' => 20, 'nama_desa' => 'Kertonegoro', 'ongkir' => 10000],
            ['id_kecamatan' => 20, 'nama_desa' => 'Curahnongko', 'ongkir' => 10000],
            ['id_kecamatan' => 20, 'nama_desa' => 'Rambigundam', 'ongkir' => 10000],

            // 21. Semboro
            ['id_kecamatan' => 21, 'nama_desa' => 'Semboro', 'ongkir' => 10000],
            ['id_kecamatan' => 21, 'nama_desa' => 'Sidomekar', 'ongkir' => 10000],
            ['id_kecamatan' => 21, 'nama_desa' => 'Sidodadi', 'ongkir' => 10000],
            ['id_kecamatan' => 21, 'nama_desa' => 'Pugeran', 'ongkir' => 10000],

            // 22. Silo
            ['id_kecamatan' => 22, 'nama_desa' => 'Silo', 'ongkir' => 10000],
            ['id_kecamatan' => 22, 'nama_desa' => 'Sumberjati', 'ongkir' => 10000],
            ['id_kecamatan' => 22, 'nama_desa' => 'Garahan', 'ongkir' => 10000],
            ['id_kecamatan' => 22, 'nama_desa' => 'Pace', 'ongkir' => 10000],

            // 23. Sukorambi
            ['id_kecamatan' => 23, 'nama_desa' => 'Sukorambi', 'ongkir' => 10000],
            ['id_kecamatan' => 23, 'nama_desa' => 'Karangpring', 'ongkir' => 10000],
            ['id_kecamatan' => 23, 'nama_desa' => 'Klungkung', 'ongkir' => 10000],

            // 24. Sukowono
            ['id_kecamatan' => 24, 'nama_desa' => 'Sukowono', 'ongkir' => 10000],
            ['id_kecamatan' => 24, 'nama_desa' => 'Sukokerto', 'ongkir' => 10000],
            ['id_kecamatan' => 24, 'nama_desa' => 'Pocangan', 'ongkir' => 10000],
            ['id_kecamatan' => 24, 'nama_desa' => 'Sumberwaru', 'ongkir' => 10000],

            // 25. Sumberbaru
            ['id_kecamatan' => 25, 'nama_desa' => 'Sumberbaru', 'ongkir' => 10000],
            ['id_kecamatan' => 25, 'nama_desa' => 'Jamintoro', 'ongkir' => 10000],
            ['id_kecamatan' => 25, 'nama_desa' => 'Pringgowirawan', 'ongkir' => 10000],
            ['id_kecamatan' => 25, 'nama_desa' => 'Karangbayat', 'ongkir' => 10000],

            // 26. Sumberjambe
            ['id_kecamatan' => 26, 'nama_desa' => 'Sumberjambe', 'ongkir' => 10000],
            ['id_kecamatan' => 26, 'nama_desa' => 'Plereyan', 'ongkir' => 10000],
            ['id_kecamatan' => 26, 'nama_desa' => 'Randuagung', 'ongkir' => 10000],
            ['id_kecamatan' => 26, 'nama_desa' => 'Kamalan', 'ongkir' => 10000],

            // 27. Sumbersari (Kelurahan)
            ['id_kecamatan' => 27, 'nama_desa' => 'Sumbersari', 'ongkir' => 10000],
            ['id_kecamatan' => 27, 'nama_desa' => 'Tegal Gede', 'ongkir' => 10000],
            ['id_kecamatan' => 27, 'nama_desa' => 'Kranjingan', 'ongkir' => 10000],
            ['id_kecamatan' => 27, 'nama_desa' => 'Antirogo', 'ongkir' => 10000],
            ['id_kecamatan' => 27, 'nama_desa' => 'Wirolegi', 'ongkir' => 10000],

            // 28. Tanggul
            ['id_kecamatan' => 28, 'nama_desa' => 'Tanggul Kulon', 'ongkir' => 10000],
            ['id_kecamatan' => 28, 'nama_desa' => 'Tanggul Wetan', 'ongkir' => 10000],
            ['id_kecamatan' => 28, 'nama_desa' => 'Darungan', 'ongkir' => 10000],
            ['id_kecamatan' => 28, 'nama_desa' => 'Klatakan', 'ongkir' => 10000],

            // 29. Tempurejo
            ['id_kecamatan' => 29, 'nama_desa' => 'Wonoasri', 'ongkir' => 10000],
            ['id_kecamatan' => 29, 'nama_desa' => 'Sidodadi', 'ongkir' => 10000],
            ['id_kecamatan' => 29, 'nama_desa' => 'Sukorejo', 'ongkir' => 10000],
            ['id_kecamatan' => 29, 'nama_desa' => 'Sanenrejo', 'ongkir' => 10000],

            // 30. Umbulsari
            ['id_kecamatan' => 30, 'nama_desa' => 'Umbulsari', 'ongkir' => 10000],
            ['id_kecamatan' => 30, 'nama_desa' => 'Umbulrejo', 'ongkir' => 10000],
            ['id_kecamatan' => 30, 'nama_desa' => 'Tanjungsari', 'ongkir' => 10000],
            ['id_kecamatan' => 30, 'nama_desa' => 'Gunungsari', 'ongkir' => 10000],

            // 31. Wuluhan
            ['id_kecamatan' => 31, 'nama_desa' => 'Wuluhan', 'ongkir' => 10000],
            ['id_kecamatan' => 31, 'nama_desa' => 'Dukuhdempok', 'ongkir' => 10000],
            ['id_kecamatan' => 31, 'nama_desa' => 'Kesilir', 'ongkir' => 10000],
            ['id_kecamatan' => 31, 'nama_desa' => 'Tamansari', 'ongkir' => 10000],

        ]);
    }
}
