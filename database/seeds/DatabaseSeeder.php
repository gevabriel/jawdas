<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(MahasiswasSeeder::class);
        $this->call(MatkulsSeeder::class);
        $this->call(ProdisSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(JamSeeder::class);
        $this->call(HariSeeder::class);
        $this->call(RuangansSeeder::class);
        $this->call(FakultasSeeder::class);
    }
}
