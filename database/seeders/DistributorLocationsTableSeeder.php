<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorLocationsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('distributor_locations')->insert([
            [
                'latitude' => 33.513807,
                'longitude' => 36.276527,
                'distributor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'latitude' => 34.802075,
                'longitude' => 38.996815,
                'distributor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
