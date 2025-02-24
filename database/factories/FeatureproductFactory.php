<?php
    
    namespace Database\Factories;
    
    use App\Models\Featureproduct;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    class FeatureproductFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Featureproduct::class;
        
        /**
         * Define the model's default state.
         */
        public function definition(): array
        {
            return [
            ];
        }
    }
