<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrintingType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $printTypes = [
            ['printing_category_id' => '1', 'name' => 'Business Cards'],
            ['printing_category_id' => '1', 'name' => 'Flyers'],
            ['printing_category_id' => '1', 'name' => 'Brochures'],
            ['printing_category_id' => '1', 'name' => 'Posters'],
            ['printing_category_id' => '1', 'name' => 'Banners'],
            ['printing_category_id' => '1', 'name' => 'Stickers'],
            ['printing_category_id' => '1', 'name' => 'Booklets'],
            ['printing_category_id' => '1', 'name' => 'Invitations'],
            ['printing_category_id' => '1', 'name' => 'Certificates'],
            ['printing_category_id' => '1', 'name' => 'Menus'],

            ['printing_category_id' => '2', 'name' => 'Portrait'],
            ['printing_category_id' => '2', 'name' => 'Landscape'],
            ['printing_category_id' => '2', 'name' => 'Event Photography'],
            ['printing_category_id' => '2', 'name' => 'Wedding Photography'],
            ['printing_category_id' => '2', 'name' => 'Travel Photography'],
            ['printing_category_id' => '2', 'name' => 'Product Photography'],
            ['printing_category_id' => '2', 'name' => 'Fashion Photography'],
            ['printing_category_id' => '2', 'name' => 'Architectural Photography'],
            ['printing_category_id' => '2', 'name' => 'Sports Photography'],
            ['printing_category_id' => '2', 'name' => 'Wildlife Photography'],
        ];

        foreach ($printTypes as $printType) {
            DB::table('printing_types')->insert([
                'printing_category_id' => $printType['printing_category_id'],
                'name' => $printType['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

