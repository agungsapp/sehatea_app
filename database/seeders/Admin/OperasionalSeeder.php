<?php

namespace Database\Seeders\Admin;

use App\Models\OperasionalModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperasionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'sewa lapak',
                'nominal' => 400000
            ],
            [
                'nama' => 'gaji karyawan',
                'nominal' => 800000
            ],
        ];

        foreach ($datas as $data) {
            OperasionalModel::create($data);
        }
    }
}
