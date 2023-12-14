<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'id' => 1,
            'nim' => 16220320,
            'nama' => 'Budi Darsono',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => date('Y-m-d'),
            'alamat' => 'Sigura-gura',
            'id_prodi' => 1,
            'id_kelas' => 1,
            'photo' => "",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
