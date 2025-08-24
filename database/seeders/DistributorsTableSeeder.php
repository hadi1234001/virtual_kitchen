<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('distributors')->insert([
            [
                'user_name' => 'distributor_1',
                'first_name' => 'أحمد',
                'second_name' => 'علي',
                'last_name' => 'خالد',
                'birth_date' => '1990-05-12',
                'phone_number' => '0991234567',
                'email' => 'ahmad@example.com',
                'password' => bcrypt('password123'),
                'chef_id' => 1, // يفترض أنه موجود في جدول chefs
                'vehicle_id' => 1, // يفترض أنه موجود في جدول vehicles
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'distributor_2',
                'first_name' => 'سامي',
                'second_name' => 'محمد',
                'last_name' => 'إبراهيم',
                'birth_date' => '1995-08-20',
                'phone_number' => '0997654321',
                'email' => 'sami@example.com',
                'password' => bcrypt('password123'),
                'chef_id' => 2,
                'vehicle_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
