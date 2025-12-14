<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerId = DB::table('roles')->where('role', 'owner')->value('id_role');
        $adminId = DB::table('roles')->where('role', 'admin')->value('id_role');
        $customerId = DB::table('roles')->where('role', 'customer')->value('id_role');

        DB::table('users')->insert([
            [
                'id_role' => $ownerId,
                'nama' => "Nayla Alya Namira",
                'email' => "namira123@gmail.com",
                'password' => Hash::make("Namira123"),
                'no_hp' => "088219120490"
            ],
            [
                'id_role' => $adminId,
                'nama' => "Habibah",
                'email' => "habibah123@gmail.com",
                'password' => Hash::make("Habibah123"),
                'no_hp' => "085333456789"
            ],
            [
                'id_role' => $customerId,
                'nama' => "Rafi Maulana Fauzi",
                'email' => "rafi123@gmail.com",
                'password' => Hash::make("Rafi123"),
                'no_hp' => "082229943627"
            ]
        ]);
    }
}
