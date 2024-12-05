<?php

namespace Database\Factories;

use App\Models\ExpenseType;
use App\Models\ExpenseDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpenseDetail>
 */
class ExpenseDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ExpenseDetail::class;

    public function definition(): array
    {
        return [
            'expense_type_id' => ExpenseType::all()->random()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}

