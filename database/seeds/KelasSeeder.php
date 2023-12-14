<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'TIF-A',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'nama' => 'TIF-B',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'nama' => 'TIF-C',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'nama' => 'TIF-D',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'nama' => 'TIF-E',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'nama' => 'TIF-F',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'nama' => 'TIF-G',
                'id_prodi' => 1,
                'angkatan' => 2021,
                'jumlah' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
            
        ];

        // Masukkan semua data ke dalam tabel menggunakan Eloquent
        DB::table('kelas')->insert($data);
    }
}
