<?php

use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
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
                'hari' => 'Senin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'hari' => 'Selasa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'hari' => 'Rabu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'hari' => 'Kamis',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'hari' => 'Jumat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Masukkan semua data ke dalam tabel menggunakan Eloquent
        DB::table('haris')->insert($data);
    }
}
