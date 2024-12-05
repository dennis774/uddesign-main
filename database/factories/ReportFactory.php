<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gcash' => fake()->randomFloat(2, 0, 1000),
            'cash' => fake()->randomFloat(2, 0, 1000),
            'print_sales' => fake()->randomFloat(2, 0, 1000),
            'merch_sales' => fake()->randomFloat(2, 0, 1000),
            'custom_sales' => fake()->randomFloat(2, 0, 1000),
            'total_sales' => fake()->randomFloat(2, 0, 3000),
            'print_expenses' => fake()->randomFloat(2, 0, 500),
            'merch_expenses' => fake()->randomFloat(2, 0, 500),
            'custom_expenses' => fake()->randomFloat(2, 0, 500),
            'total_expenses' => fake()->randomFloat(2, 0, 1500),
            'created_at' => Carbon::parse(fake()->dateTimeBetween('-1 year January 1st', 'now'))->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse(fake()->dateTimeBetween('-1 year January 1st', 'now'))->format('Y-m-d H:i:s'),
        ];
    }
}

