<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Тестовый продукт',
            'consist' => 'состав',
            'description' => 'test',
            'price' => 100,
            'product_category_id' => ProductCategory::get()->first()->id,
            'brand_id' => Brand::get()->first()->id,
        ]);
    }
}
