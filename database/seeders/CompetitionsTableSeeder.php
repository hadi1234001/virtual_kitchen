<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('competitions')->insert([
            [
                'plate_name' => 'سوشي',
                'description' => 'مسابقة إعداد أفضل طبق سوشي باستخدام مكونات طازجة.',
                'competition_date' => '2025-09-10',
                'start_time' => '15:00:00',
                'image_path' => 'competitions/sushi.jpg',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
