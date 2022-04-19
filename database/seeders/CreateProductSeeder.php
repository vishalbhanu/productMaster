<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'productName' => 'TV',
                'price' => '20000',
                'discountPercentage' => '2.4',
                'description' => 'Best Feature Black TV'
            ],
            [
                'productName' => 'Fridge',
                'price' => '15000',
                'discountPercentage' => '1',
                'description' => 'Best Feature fridge'
            ],
        ];

        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
