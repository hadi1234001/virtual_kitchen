<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicles')->insert([
            ['vehicle_name' => 'دراجة هوائية', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'دراجة نارية', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'سيارة', 'created_at' => now(), 'updated_at' => now()],
            ['vehicle_name' => 'شاحنة صغيرة', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
