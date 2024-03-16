<?php

namespace Database\Seeders\Admin;

use App\Models\SaldoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'saldo sehatea',
                'id_user' => 1,
                'saldo' => 1000000,
            ],
            [
                'nama' => 'dana agung',
                'id_user' => 2,
                'saldo' => 1000000,
            ],
            [
                'nama' => 'dana ajis',
                'id_user' => 3,
                'saldo' => 3000000,
            ],
        ];

        foreach ($datas as $data) {
            SaldoModel::create($data);
        }
    }
}
