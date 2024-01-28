<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mall;

class MallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mall::create([
            'name' => 'Планета',
            'city' => 'Красноярск',
            'planeta_mall_code' => 'krs',
            'site_href' => 'https://krs.planeta-mall.ru/',
        ]);
    }
}
