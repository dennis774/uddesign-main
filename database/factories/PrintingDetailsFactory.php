<?php

namespace Database\Factories;

use App\Models\PrintingType;
use App\Models\PrintingDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'printing_type_id' => PrintingType::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}


