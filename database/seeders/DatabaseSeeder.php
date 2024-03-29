<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MallSeeder::class,
            BrandSeeder::class,
            ProductCategorySeeder::class,
            LookColorSeeder::class,
            LookCategorySeeder::class,
            LookStyleSeeder::class,
            DesignerSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
