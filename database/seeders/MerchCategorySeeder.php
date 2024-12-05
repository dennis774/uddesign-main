<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerchCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merch_categories = [
            'VARSITY JACKET',
            'HOODIE JACKET',
            'UDD T-SHIRT',
            'Tote',
            'Mug',
            'Umbrella',
            'N-Book',
        ];

        foreach ($merch_categories as $category) {
            DB::table('merch_categories')->insert([
                'name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
