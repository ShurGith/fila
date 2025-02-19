<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Imageproduct;
use App\Models\Product;

class ImageproductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imageproduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'img_path' => fake()->word(),
            'img_pos' => fake()->numberBetween(-10000, 10000),
            'product_id' => Product::factory(),
        ];
    }
}
