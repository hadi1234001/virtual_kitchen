<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sub_types')->insert([
            // شرقي
            ['sub_type_name' => 'كباب', 'type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['sub_type_name' => 'شاورما', 'type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['sub_type_name' => 'فتوش', 'type_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // غربي
            ['sub_type_name' => 'بيتزا', 'type_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['sub_type_name' => 'باستا', 'type_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // سلطات
            ['sub_type_name' => 'سيزر', 'type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['sub_type_name' => 'سلطة يونانية', 'type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
