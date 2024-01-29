<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat1 = ProductCategory::create([
            'name' => 'Мужчины',
        ]);

        $cat2 = ProductCategory::create([
            'name' => 'Обувь',
            'parent_id' => $cat1->id,
        ]);

        $cat3 = ProductCategory::create([
            'name' => 'Кроссовки',
            'parent_id' => $cat2->id,
        ]);

        $cat4 = ProductCategory::create([
            'name' => 'Женщины',
        ]);
    }
}
