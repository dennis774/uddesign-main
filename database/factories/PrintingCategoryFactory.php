<?php

namespace Database\Factories;
use App\Models\PrintingCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrintingCategoryFactory extends Factory
{
    protected $model = PrintingCategory::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->word(), // Generates random category names
        ];
    }
}
