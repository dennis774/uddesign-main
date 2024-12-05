<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - xs'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - s'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - m'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - l'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - xl'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - xxl'],
            ['merch_category_id' => 1, 'name' => 'VARSITY JACKET - xxxl'],
            ['merch_category_id' => 2, 'name' => 'HOODIE JACKET - xs'],
            ['merch_category_id' => 2, 'name' => 'HOODIE JACKET - s'],
            ['merch_category_id' => 2, 'name' => 'HOODIE JACKET - m'],
            ['merch_category_id' => 2, 'name' => 'HOODIE JACKET - l'],
            ['merch_category_id' => 2, 'name' => 'HOODIE JACKET - xl'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - xs'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - s'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - m'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - l'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - xl'],
            ['merch_category_id' => 3, 'name' => 'UDD T-SHIRT - xxl'],
            ['merch_category_id' => 4, 'name' => 'Tote'],
            ['merch_category_id' => 5, 'name' => 'Mug'],
            ['merch_category_id' => 6, 'name' => 'Umbrella'],
            ['merch_category_id' => 7, 'name' => 'N-Book'],
        ];

        foreach ($types as $type) {
            DB::table('merch_types')->insert([
                'merch_category_id' => $type['merch_category_id'],
                'name' => $type['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

