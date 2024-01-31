<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LookStyle;

class LookStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LookStyle::create([
            'name' => 'На каждый день',
        ]);

        LookStyle::create([
            'name' => 'Весенний',
        ]);
    }
}
