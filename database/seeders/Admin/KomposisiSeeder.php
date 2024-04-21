<?php

namespace Database\Seeders\Admin;

use App\Models\BahanModel;
use App\Models\KomposisiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            // es teh original
            [
                'id_produk' => 1,
                'id_bahan' => 1,
                'takaran' => 50,
            ],
            [
                'id_produk' => 1,
                'id_bahan' => 3,
                'takaran' => 300,
            ],
            [
                'id_produk' => 1,
                'id_bahan' => 5,
                'takaran' => 1,
            ],
            [
                'id_produk' => 1,
                'id_bahan' => 4,
                'takaran' => 200,
            ],
            //lemon tea
            [
                'id_produk' => 2,
                'id_bahan' => 5,
                'takaran' => 1,
            ],
            [
                'id_produk' => 2,
                'id_bahan' => 4,
                'takaran' => 200,
            ],
            [
                'id_produk' => 2,
                'id_bahan' => 3,
                'takaran' => 300,
            ],
            [
                'id_produk' => 2,
                'id_bahan' => 1,
                'takaran' => 40,
            ],
            [
                'id_produk' => 2,
                'id_bahan' => 13,
                'takaran' => 15,
            ],
            //milk tea
            [
                'id_produk' => 3,
                'id_bahan' => 5,
                'takaran' => 1,
            ],
            [
                'id_produk' => 3,
                'id_bahan' => 4,
                'takaran' => 150,
            ],
            [
                'id_produk' => 3,
                'id_bahan' => 3,
                'takaran' => 300,
            ],
            [
                'id_produk' => 3,
                'id_bahan' => 1,
                'takaran' => 50,
            ],
            [
                'id_produk' => 3,
                'id_bahan' => 2,
                'takaran' => 30,
            ],
            // greentea
            [
                'id_produk' => 4,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 4,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 4,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 4,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 4,
                'id_bahan' => 2, // susu
                'takaran' => 20,
            ],
            [
                'id_produk' => 4,
                'id_bahan' => 8, // powder greentea
                'takaran' => 35,
            ],
            // redvelvet
            [
                'id_produk' => 5,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 5,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 5,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 5,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 5,
                'id_bahan' => 2, // susu
                'takaran' => 20,
            ],
            [
                'id_produk' => 5,
                'id_bahan' => 9, // powder
                'takaran' => 35,
            ],
            // leci
            [
                'id_produk' => 6,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 6,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 6,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 6,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 6,
                'id_bahan' => 11, // sirup leci
                'takaran' => 15,
            ],
            // markisa
            [
                'id_produk' => 7,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 7,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 7,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 7,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 7,
                'id_bahan' => 12, // sirup markisa
                'takaran' => 15,
            ],
            // coklat
            [
                'id_produk' => 8,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 8,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 8,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 8,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 8,
                'id_bahan' => 2, // susu
                'takaran' => 20,
            ],
            [
                'id_produk' => 8,
                'id_bahan' => 6, // powder coklat
                'takaran' => 35,
            ],
            // taro
            [
                'id_produk' => 9,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 9,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 9,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 9,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 9,
                'id_bahan' => 2, // susu
                'takaran' => 20,
            ],
            [
                'id_produk' => 9,
                'id_bahan' => 7, // powder taro
                'takaran' => 35,
            ],
            // strawbery
            [
                'id_produk' => 10,
                'id_bahan' => 5, // cup
                'takaran' => 1,
            ],
            [
                'id_produk' => 10,
                'id_bahan' => 4, // teh
                'takaran' => 200,
            ],
            [
                'id_produk' => 10,
                'id_bahan' => 3, // es batu
                'takaran' => 300,
            ],
            [
                'id_produk' => 10,
                'id_bahan' => 1, // gula
                'takaran' => 40,
            ],
            [
                'id_produk' => 10,
                'id_bahan' => 2, // susu
                'takaran' => 20,
            ],
            [
                'id_produk' => 10,
                'id_bahan' => 10, // powder strawbery
                'takaran' => 35,
            ],
            // next : yakult
        ];

        foreach ($datas as $data) {
            $bahan = BahanModel::find($data['id_bahan']);
            $harga_total = $data['takaran'] * $bahan->harga_satuan;

            $data['total_harga'] = $harga_total;
            KomposisiModel::create($data);
        }
    }
}
