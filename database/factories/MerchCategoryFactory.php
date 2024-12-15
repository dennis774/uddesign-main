<?php

namespace Database\Factories;

use App\Models\MerchCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchCategoryFactory extends Factory
{
    protected $model = MerchCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(), // Generates random category names
        ];
    }
}
