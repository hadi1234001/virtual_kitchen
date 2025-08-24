<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemovedIngredientsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('removed_ingredients')->insert([
            [
                'order_plate_id' => 1,
                'ingredient_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_plate_id' => 2,
                'ingredient_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
