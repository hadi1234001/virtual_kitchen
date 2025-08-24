<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChefsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chefs')->insert([
            [
                'user_name' => 'chef_ahmad',
                'first_name' => 'أحمد',
                'second_name' => 'محمد',
                'last_name' => 'خالد',
                'image_path' => 'images/chefs/ahmad.jpg',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password123'),
                'overview' => 'شيف متخصص بالمأكولات الشرقية.',
                'birth_date' => '1985-06-15',
                'mobile_number' => '0999999999',
                'cv_path' => null,
                'latitude' => 33.5138,
                'longitude' => 36.2765,
                'is_frozen' => false,
                'state_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'chef_sara',
                'first_name' => 'سارة',
                'second_name' => 'علي',
                'last_name' => 'يوسف',
                'image_path' => 'images/chefs/sara.jpg',
                'email' => 'sara@example.com',
                'password' => Hash::make('password123'),
                'overview' => 'شيف متخصصة بالحلويات الغربية.',
                'birth_date' => '1990-04-20',
                'mobile_number' => '0988888888',
                'cv_path' => null,
                'latitude' => 35.5131,
                'longitude' => 35.7818,
                'is_frozen' => false,
                'state_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
