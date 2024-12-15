<?php

namespace Database\Factories;

use App\Models\PrintingType;
use App\Models\PrintingDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrintingDetail>
 */
class PrintingDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PrintingDetails::class;

    public function definition(): array
    {
        return [
            'printing_type_id' => PrintingType::factory(),
            'quantity' => $this->faker->numberBetween(1, 500),
            'created_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
        ];
    }

    public function forEveryDay()
    {
        $data = [];
        $startDate = Carbon::parse('2022-01-01');
        $endDate = Carbon::parse('2024-12-31');

        while ($startDate->lte($endDate)) {
            $data[] = [
                'printing_type_id' => PrintingType::factory(),
                'quantity' => $this->faker->numberBetween(1, 500),
                'created_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
                'updated_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
            ];
            $startDate->addDay();
        }

        return $data;
    }
}



   