<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    public function run()
    {
        // Create 10 tours using the factory
        Tour::factory(10)->create();
    }
}
