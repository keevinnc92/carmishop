<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array 
     */

    // protected $model = Product::class();

    public function definition()
    {
        return [
            'name' => $this->faker->word().' '.$this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => rand(100, 1000),
            'created_at' => now(),
            'updated_at' => null,
            'brand_id' => rand(1, 5),
        ];
    }
}
