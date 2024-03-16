<?php

namespace Database\Seeders\Admin;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'admin sehatea',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'agung saputra',
                'email' => 'agung@gmail.com',
                'role' => 'owner',
                'password' => Hash::make('sehatea123'),
            ],
            [
                'name' => 'mas ajis santoso',
                'email' => 'ajis@gmail.com',
                'role' => 'investor',
                'password' => Hash::make('sehatea123'),
            ],
        ];

        foreach ($datas as $data) {
            User::create($data);
        }
    }
}
