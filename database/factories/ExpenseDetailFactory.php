<?php

namespace Database\Factories;

use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ExpenseDetailFactory extends Factory
{
    public function definition()
    {
        return [
            'expense_type_id' => ExpenseType::factory(),
            'price' => $this->faker->numberBetween(100, 10000),
            'created_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
        ];
    }

    /**
     * Generate expense details for every day from 2022 to 2024.
     */
    public function forEveryDay()
    {
        $data = [];
        $startDate = Carbon::parse('2022-01-01');
        $endDate = Carbon::parse('2024-12-31');

        while ($startDate->lte($endDate)) {
            $data[] = [
                'expense_type_id' => ExpenseType::factory(),
                'price' => $this->faker->numberBetween(100, 10000),
                'created_at' => $startDate->copy(),
                'updated_at' => $startDate->copy(),
            ];
            $startDate->addDay();
        }

        return $data;
    }
}
