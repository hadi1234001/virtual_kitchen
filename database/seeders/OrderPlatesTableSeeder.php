<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderPlatesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_plates')->insert([
            [
                'order_id'  => 1,
                'plate_id'  => 1,
                'price_id'  => 1,
                'rate'      => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id'  => 1,
                'plate_id'  => 2,
                'price_id'  => 3,
                'rate'      => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id'  => 2,
                'plate_id'  => 3,
                'price_id'  => 2,
                'rate'      => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id'  => 2,
                'plate_id'  => 1,
                'price_id'  => 2,
                'rate'      => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
