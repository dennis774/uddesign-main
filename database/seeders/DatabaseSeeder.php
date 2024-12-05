<?php

namespace Database\Seeders;

use App\Models\ExpenseDetail;
use App\Models\MerchDetails;
use App\Models\PrintingDetails;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Report;
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
        ExpenseDetail::factory()->Count(1000)->create();
    }
}
