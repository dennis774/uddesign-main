<?php

namespace Database\Factories;

use App\Models\MerchType;
use App\Models\MerchDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MerchDetails>
 */
class MerchDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MerchDetails::class;

    public function definition(): array
    {
        return [
            'merch_type_id' => MerchType::all()->random()->id,
            'pcs' => $this->faker->numberBetween(1, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}

