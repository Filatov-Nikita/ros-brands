<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LookColor;

class LookColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LookColor::create([
            'name' => 'Красный',
            'color_in_hex' => '#000000',
        ]);
    }
}
