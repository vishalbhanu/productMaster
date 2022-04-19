<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productName'=> $this->faker->name,
            'price'=> $this->faker->numberBetween($min = 1500, $max = 6000),
            'description'=> $this->faker->text,
            'discountPercentage' => $this->faker->numberBetween($min = 1, $max = 100),
        ];
    }
}
