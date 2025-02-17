<?php
    
    namespace Database\Factories;
    
    use App\Models\Category;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    class CategoryFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Category::class;
        
        /**
         * Define the model's default state.
         */
        public function definition(): array
        {
            return [
                /*            'name' => fake()->name(),
                            'bgcolor' => fake()->text(),
                            'color' => fake()->word(),
                            'image' => fake()->text(),
                            'icon' => fake()->text(),
                            'icon_active' => fake()->boolean(),*/
            ];
        }
    }
