<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $images = [
            'uploads/products/1770644415_Iphone14ProMax.jpg',
            'uploads/products/1770644468_Iphone18.jpg',
            'uploads/products/1770644681_dell-premium-laptops_jsrp.jpg',
            'uploads/products/1770645134_maxim-hopman-Hin-rzhOdWs-unsplash.jpg',
        ];

        return [
            'name'  => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 500),
            'image' => fake()->randomElement($images),
        ];
    }
}
