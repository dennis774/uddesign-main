<?php

namespace Database\Factories;

use App\Models\MerchType;
use App\Models\MerchCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchTypeFactory extends Factory
{
    protected $model = MerchType::class;

    public function definition()
    {
        return [
            'merch_category_id' => MerchCategory::factory(), // Creates a related category
            'name' => $this->faker->word(), // Generates random type names
        ];
    }
}
