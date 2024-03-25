<?php

namespace Database\Seeders\Admin;

use App\Models\BahanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Gula Cair',
                'harga' => 17000,
                'bobot' => 2000,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Susu 3 Sapi',
                'harga' => 12500,
                'bobot' => 490,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Es Batu',
                'harga' => 13000,
                'bobot' => 10000,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Air Teh',
                'harga' => 5000,
                'bobot' => 4000,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Gelas Cup',
                'harga' => 283000,
                'bobot' => 500,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            // powder series
            [
                'nama' => 'Powder Coklat',
                'harga' => 75000,
                'bobot' => 1000,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Powder Taro',
                'harga' => 27500,
                'bobot' => 500,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Powder GreenTea',
                'harga' => 27500,
                'bobot' => 500,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Powder RedVelvet',
                'harga' => 27500,
                'bobot' => 500,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Powder Strawberry',
                'harga' => 27500,
                'bobot' => 500,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            // sirup series
            [
                'nama' => 'Marjan Lychee',
                'harga' => 27200,
                'bobot' => 460,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Marjan Markisa',
                'harga' => 27200,
                'bobot' => 460,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],
            [
                'nama' => 'Marjan Lemon',
                'harga' => 27200,
                'bobot' => 460,
                'satuan' => 'ml',
                'harga_satuan' => 0,
            ],

        ];

        foreach ($data as $bh) {
            $bh['harga_satuan'] = $bh['harga'] / $bh['bobot'];
            BahanModel::create($bh);
        }
    }
}
