<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use database\factories\ProductFactory;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::factory()->times(100)->create();
    }
}
