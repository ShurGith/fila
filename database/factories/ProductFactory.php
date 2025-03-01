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
            ];
        }
    }
