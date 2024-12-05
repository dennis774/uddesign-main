<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrintingCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $printing_categories = [
            'Print',
            'Photo',
        ];

        foreach ($printing_categories as $category) {
            DB::table('printing_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
