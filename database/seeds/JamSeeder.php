<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JamSeeder extends Seeder
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
                'jam' => '07.00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'jam' => '09.30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'jam' => '13.00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'jam' => '14.30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'jam' => '16.00',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Masukkan semua data ke dalam tabel menggunakan Eloquent
        DB::table('jams')->insert($data);
    }
}
