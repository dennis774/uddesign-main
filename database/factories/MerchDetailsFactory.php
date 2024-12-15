<?php

namespace Database\Factories;

use App\Models\MerchDetails;
use App\Models\MerchType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class MerchDetailsFactory extends Factory
{
    protected $model = MerchDetails::class;

    public function definition()
    {
        return [
            'merch_type_id' => MerchType::factory(),
            'pcs' => $this->faker->numberBetween(1, 500),
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
                'merch_type_id' => MerchType::factory(),
                'pcs' => $this->faker->numberBetween(1, 500),
                'created_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
                'updated_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-12-31'),
            ];
            $startDate->addDay();
        }

        return $data;
    }
}

