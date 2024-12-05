<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'OfficeUse', 'Ads', 'Maintenance', 'PrintSup', 'PackSup', 'Stocks', 'CustomSup', 'Others'
        ];

        $types = ['print', 'merch', 'custom_deals'];

        foreach ($categories as $category) {
            $categoryId = DB::table('expense_categories')->where('name', $category)->first()->id;
            foreach ($types as $type) {
                DB::table('expense_types')->insert([
                    'expense_category_id' => $categoryId,
                    'name' => $type,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}

