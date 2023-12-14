<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MatkulsSeeder extends Seeder
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
                'kode' => 'CIF61001',
                'matkul' => 'Kalkulus',
                'sks' => 3,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'kode' => 'COM60014',
                'matkul' => 'Pemrograman Dasar',
                'sks' => 4,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'kode' => 'COM60016',
                'matkul' => 'Pengantar Keilmuan Komputer',
                'sks' => 2,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'kode' => 'COM60011',
                'matkul' => 'Arsitektur dan Organisasi Komputer',
                'sks' => 3,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'kode' => 'UBU60004',
                'matkul' => 'Bahasa Inggris',
                'sks' => 3,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'kode' => 'COM60015',
                'matkul' => 'Matematika Komputasi',
                'sks' => 3,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'kode' => 'MPK60001',
                'matkul' => 'Agama Islam',
                'sks' => 2,
                'smt' => 1,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'kode' => 'MPK60006',
                'matkul' => 'Kewarganegaraan',
                'sks' => 2,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'kode' => 'CIF62002',
                'matkul' => 'Sistem Operasi',
                'sks' => 4,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'kode' => 'CIF62003',
                'matkul' => 'Pemrograman Berorientasi Obyek',
                'sks' => 5,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'kode' => 'CIF62004',
                'matkul' => 'Algoritma dan Struktur Data',
                'sks' => 4,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'kode' => 'CIF62005',
                'matkul' => 'Aljabar Linear',
                'sks' => 2,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'kode' => 'CIF62006',
                'matkul' => 'Statistika dan Teori Peluang',
                'sks' => 3,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 14,
                'kode' => 'UBU60003',
                'matkul' => 'Kewirausahaan',
                'sks' => 2,
                'smt' => 2,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 15,
                'kode' => 'MPK60008',
                'matkul' => 'Pancasila',
                'sks' => 2,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 16,
                'kode' => 'CIF61007',
                'matkul' => 'Jaringan Komputer',
                'sks' => 4,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 17,
                'kode' => 'CIF61008',
                'matkul' => 'Desain dan Analisis Algoritma',
                'sks' => 3,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 18,
                'kode' => 'CIF61009',
                'matkul' => 'Basis Data',
                'sks' => 4,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 19,
                'kode' => 'CIF61010',
                'matkul' => 'Metode Numerik',
                'sks' => 3,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 20,
                'kode' => 'CIF61011',
                'matkul' => 'Kecerdasan Buatan',
                'sks' => 3,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 21,
                'kode' => 'CIF61012',
                'matkul' => 'Interaksi Manusia dan Komputer',
                'sks' => 3,
                'smt' => 3,
                'semester' => 'Ganjil',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 22,
                'kode' => 'MPK60007',
                'matkul' => 'Bahasa Indonesia',
                'sks' => 2,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 23,
                'kode' => 'CIF62013',
                'matkul' => 'Keamanan Informasi',
                'sks' => 4,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 24,
                'kode' => 'CIF62014',
                'matkul' => 'Sistem Multimedia',
                'sks' => 3,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 25,
                'kode' => 'CIF62015',
                'matkul' => 'Pemrograman Web',
                'sks' => 4,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 26,
                'kode' => 'CIF62016',
                'matkul' => 'Analisis dan Perancangan Sistem',
                'sks' => 5,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 27,
                'kode' => 'CIF62017',
                'matkul' => 'Pengantar Pembelajaran Mesin',
                'sks' => 4,
                'smt' => 4,
                'semester' => 'Genap',
                'id_prodi' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::table('matkuls')->insert($data);
    }
}
