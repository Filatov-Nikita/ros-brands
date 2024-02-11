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
        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'name' => 'Тестовый продукт ' . $i,
                'consist' => 'состав ' . $i,
                'description' => 'test ' . $i,
                'price' => 100 + $i,
                'product_category_id' => ProductCategory::get()->first()->id,
                'brand_id' => Brand::get()->first()->id,
            ]);
        }
    }
}
