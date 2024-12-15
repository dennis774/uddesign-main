<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use App\Models\MerchType;
use App\Models\ExpenseType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MerchDetails;
use App\Models\ExpenseDetail;
use App\Models\MerchCategory;
use App\Models\ExpenseCategory;
use App\Models\PrintingCategory;
use App\Models\PrintingType;
use App\Models\PrintingDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Report::factory()->Count(1000)->create();
        // PrintingDetails::factory()->Count(1000)->create();
        // MerchDetails::factory()->Count(1000)->create();
        // ExpenseDetail::factory()->Count(1000)->create();




        ExpenseCategory::factory(10)->create()->each(function ($category) {
            // For each category, create 3 Expense Types
            $types = ExpenseType::factory(3)->create(['expense_category_id' => $category->id]);

            // For each Expense Type, generate Expense Details for every day
            foreach ($types as $type) {
                foreach (ExpenseDetail::factory()->forEveryDay() as $data) {
                    $data['expense_type_id'] = $type->id;
                    ExpenseDetail::create($data);
                }
            }
        });




        MerchCategory::factory(10)->create()->each(function ($category) {
            // For each category, create 3 Expense Types
            $types = MerchType::factory(3)->create(['merch_category_id' => $category->id]);

            // For each Expense Type, generate Expense Details for every day
            foreach ($types as $type) {
                foreach (MerchDetails::factory()->forEveryDay() as $data) {
                    $data['merch_type_id'] = $type->id;
                    MerchDetails::create($data);
                }
            }
        });



        PrintingCategory::factory(10)->create()->each(function ($category) {
            // For each category, create 3 Expense Types
            $types = PrintingType::factory(3)->create(['printing_category_id' => $category->id]);

            // For each Expense Type, generate Expense Details for every day
            foreach ($types as $type) {
                foreach (PrintingDetails::factory()->forEveryDay() as $data) {
                    $data['printing_type_id'] = $type->id;
                    PrintingDetails::create($data);
                }
            }
        });
    }
}
