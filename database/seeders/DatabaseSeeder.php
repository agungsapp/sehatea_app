<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Admin\BahanSeeder;
use Database\Seeders\Admin\KomposisiSeeder;
use Database\Seeders\Admin\OperasionalSeeder;
use Database\Seeders\Admin\ProdukSeeder;
use Database\Seeders\Admin\SaldoSeeder;
use Database\Seeders\Admin\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(BahanSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SaldoSeeder::class);
        $this->call(OperasionalSeeder::class);
        $this->call(KomposisiSeeder::class);
    }
}
