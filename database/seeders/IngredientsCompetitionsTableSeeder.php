<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsCompetitionsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ingredients_competitions')->insert([
            ['competition_id' => 1, 'ingredient_id' => 10, 'created_at' => now(), 'updated_at' => now()], // أرز السوشي
            ['competition_id' => 1, 'ingredient_id' => 11, 'created_at' => now(), 'updated_at' => now()], // خل الأرز
            ['competition_id' => 1, 'ingredient_id' => 12, 'created_at' => now(), 'updated_at' => now()], // سلمون طازج
            ['competition_id' => 1, 'ingredient_id' => 13, 'created_at' => now(), 'updated_at' => now()], // طحلب بحر
            ['competition_id' => 1, 'ingredient_id' => 14, 'created_at' => now(), 'updated_at' => now()], // خيار
        ]);
    }
}
