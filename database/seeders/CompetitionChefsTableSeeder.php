<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionChefsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('competition_chefs')->insert([
            [
                'competition_id' => 1,
                'chef_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_id' => 1,
                'chef_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
