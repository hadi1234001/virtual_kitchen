<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run(): void
    {
        Client::create([
            'name' => 'أحمد خالد',
            'mobile_number' => '0933001122',
            'location' => 'دمشق - المزة',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password123'),
            'latitude' => 33.5102,
            'longitude' => 36.2913,
            'is_frozen' => false,
            'state_id' => 1,
        ]);

        Client::create([
            'name' => 'سارة عبد الله',
            'mobile_number' => '0944556677',
            'location' => 'حلب - العزيزية',
            'email' => 'sara@example.com',
            'password' => Hash::make('password123'),
            'latitude' => 36.2021,
            'longitude' => 37.1343,
            'is_frozen' => false,
            'state_id' => 2,
        ]);
    }
}
