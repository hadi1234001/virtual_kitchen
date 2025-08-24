<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('states')->insert([
            ['state_name' => 'دمشق'],
            ['state_name' => 'ريف دمشق'],
            ['state_name' => 'حلب'],
            ['state_name' => 'حمص'],
            ['state_name' => 'حماة'],
            ['state_name' => 'اللاذقية'],
            ['state_name' => 'طرطوس'],
            ['state_name' => 'إدلب'],
            ['state_name' => 'درعا'],
            ['state_name' => 'القنيطرة'],
            ['state_name' => 'السويداء'],
            ['state_name' => 'دير الزور'],
            ['state_name' => 'الرقة'],
            ['state_name' => 'الحسكة']
        ]);
    }
}
