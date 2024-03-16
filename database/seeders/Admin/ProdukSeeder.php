<?php

namespace Database\Seeders\Admin;

use App\Models\ProdukModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Iced Tea Original',
                'hpp' => 0,
                'harga_jual' => 5000,
            ],
            [
                'nama' => 'Iced Lemon Tea',
                'hpp' => 0,
                'harga_jual' => 6000,
            ],
            [
                'nama' => 'Iced Milk Tea',
                'hpp' => 0,
                'harga_jual' => 6000,
            ],
            [
                'nama' => 'Iced Green Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Red Velvet Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Lychee Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Markisa Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Coklat Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Taro Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Strawberry Tea',
                'hpp' => 0,
                'harga_jual' => 8000,
            ],
            [
                'nama' => 'Iced Yakult Tea',
                'hpp' => 0,
                'harga_jual' => 9000,
            ],
        ];

        foreach ($data as $produk) {
            ProdukModel::create($produk);
        }
    }
}
