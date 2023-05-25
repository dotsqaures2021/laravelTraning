<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

      // The name of the factory's corresponding model.

   

    protected $model = Product::class;

    // Define the model's default state.
 

    public function definition(): array
    {
        return [
            'name' => $this->faker->numerify('Product-##'),
            'price' => $this->faker->numberBetween(5000, 10000),
            'sale_price' => $this->faker->numberBetween(1000, 4999),
            'color'=> $this->faker->randomElement(['Red','Yellow','Blue','Black','White']),
            'product_code'=> $this->faker->numerify('LT-######'),
            'brand_id'=> $this->faker->randomElement(Brand::pluck('id')),
            'category_id'=> $this->faker->randomElement(Category::pluck('id')),
            'gender'=> $this->faker->randomElement(['male','Female','Child','Unisex']),
            'function'=> $this->faker->randomElement(['analog','digital']),
            'stock'=> $this->faker->randomDigit(),
            'description'=> $this->faker->text($maxNbChars = 200),
            'image'=> $this->faker->imageUrl($width = 640, $height= 480),
            'is_active'=> $this->faker->randomElement(['1','0']),
        ];
    }
}
