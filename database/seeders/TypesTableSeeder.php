<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('types')->insert([
            ['type_name' => 'أطباق شرقية', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'أطباق غربية', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'سلطات', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'حلويات', 'created_at' => now(), 'updated_at' => now()],
            ['type_name' => 'مشروبات', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
