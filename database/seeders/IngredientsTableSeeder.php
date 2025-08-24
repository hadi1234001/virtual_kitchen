<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = [
            // كباب حلبي
            'لحم غنم مفروم',
            'بصل',
            'بقدونس',
            'ملح',
            'فلفل أسود',
            'بهارات الكباب',

            // شاورما دجاج
            'دجاج',
            'ثوم',
            'لبن زبادي',
            'عصير ليمون',
            'خل',
            'بهارات الشاورما',
            'مخلل خيار',
            'خبز عربي',

            // بيتزا مارجريتا
            'عجينة بيتزا',
            'صلصة طماطم',
            'جبنة موزاريلا',
            'زيت زيتون',
            'ريحان طازج',

            // سوشي
            'أرز السوشي',
            'خل الأرز',
            'سلمون طازج',
            'طحالب بحر',
            'خيار',
            'سمك'
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'ingredient_name' => $ingredient,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
