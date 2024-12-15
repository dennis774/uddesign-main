<?php
namespace Database\Factories;

use App\Models\PrintingType;
use App\Models\PrintingCategory;
use Illuminate\Database\Eloquent\Factories\Factory;


class PrintingTypeFactory extends Factory
{
    protected $model = PrintingType::class;

    public function definition()
    {
        return [
            'printing_category_id' => PrintingCategory::factory(), // Creates a related category
            'name' => $this->faker->word(), // Generates random type names
        ];
    }
}

