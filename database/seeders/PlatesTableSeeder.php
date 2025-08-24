<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plates')->insert([
            [
                'plate_name' => 'كباب حلبي',
                'description' => 'لحم مشوي على الفحم مع بهارات خاصة.',
                'photo_path' => 'plates/kebab.jpg',
                'is_archived' => false,
                'sub_type_id' => 1,
                'chef_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plate_name' => 'شاورما دجاج',
                'description' => 'شاورما دجاج مع الثوم والمخلل.',
                'photo_path' => 'plates/shawarma.jpg',
                'is_archived' => false,
                'sub_type_id' => 2,
                'chef_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plate_name' => 'بيتزا مارجريتا',
                'description' => 'بيتزا طازجة مع صلصة الطماطم والجبن.',
                'photo_path' => 'plates/pizza.jpg',
                'is_archived' => false,
                'sub_type_id' => 4,
                'chef_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
