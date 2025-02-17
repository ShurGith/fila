<?php
    
    namespace Database\Factories;
    
    use App\Models\Product;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    class ProductFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Product::class;
        
        /**
         * Define the model's default state.
         */
        public function definition(): array
        {
            return [
                /*            'name' => fake()->name(),
                            'description' => fake()->text(),
                            'price' => fake()->numberBetween(-10000, 10000),
                            'active' => fake()->boolean(),
                            'oferta' => fake()->boolean(),
                            'oferta_descuento' => fake()->numberBetween(-10000, 10000),
                            'units' => fake()->numberBetween(-10000, 10000),
                            'user_id' => User::factory(),*/
            ];
        }
    }
