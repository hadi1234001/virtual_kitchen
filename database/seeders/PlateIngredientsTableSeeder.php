<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlateIngredientSeeder extends Seeder
{
    public function run(): void
    {
        $plateIngredients = [
            // كباب حلبي (plate_id = 1)
            ['plate_id' => 1, 'ingredient_id' => 1], // لحم غنم مفروم
            ['plate_id' => 1, 'ingredient_id' => 2], // بصل
            ['plate_id' => 1, 'ingredient_id' => 3], // بقدونس
            ['plate_id' => 1, 'ingredient_id' => 4], // ملح
            ['plate_id' => 1, 'ingredient_id' => 5], // فلفل أسود
            ['plate_id' => 1, 'ingredient_id' => 6], // بهارات الكباب

            // شاورما دجاج (plate_id = 2)
            ['plate_id' => 2, 'ingredient_id' => 7], // دجاج
            ['plate_id' => 2, 'ingredient_id' => 8], // ثوم
            ['plate_id' => 2, 'ingredient_id' => 9], // لبن زبادي
            ['plate_id' => 2, 'ingredient_id' => 10], // عصير ليمون
            ['plate_id' => 2, 'ingredient_id' => 11], // خل
            ['plate_id' => 2, 'ingredient_id' => 12], // بهارات الشاورما
            ['plate_id' => 2, 'ingredient_id' => 13], // مخلل خيار
            ['plate_id' => 2, 'ingredient_id' => 14], // خبز عربي

            // بيتزا مارجريتا (plate_id = 3)
            ['plate_id' => 3, 'ingredient_id' => 15], // عجينة بيتزا
            ['plate_id' => 3, 'ingredient_id' => 16], // صلصة طماطم
            ['plate_id' => 3, 'ingredient_id' => 17], // جبنة موزاريلا
            ['plate_id' => 3, 'ingredient_id' => 18], // زيت زيتون
            ['plate_id' => 3, 'ingredient_id' => 19], // ريحان طازج
        ];

        foreach ($plateIngredients as $pi) {
            DB::table('plate_ingredients')->insert([
                'plate_id' => $pi['plate_id'],
                'ingredient_id' => $pi['ingredient_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
