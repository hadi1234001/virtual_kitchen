<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionClientsRatingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('competition_clients_rating')->insert([
            [
                'competition_chefs_id' => 1,
                'client_id' => 2,
                'rate' => 5,
                'comment' => 'أفضل سوشي ذقته في حياتي!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_chefs_id' => 1,
                'client_id' => 1,
                'rate' => 4,
                'comment' => 'الطعم ممتاز لكن ينقصه قليل من الملح.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
