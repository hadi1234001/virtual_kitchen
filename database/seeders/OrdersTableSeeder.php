<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'order_date' => now()->toDateString(),
                'order_time' => now()->toTimeString(),
                'delivery_date' => now()->addDays(1)->toDateString(),
                'delivery_time' => '14:30:00',
                'note' => 'يرجى التوصيل على العنوان الموضح بدقة.',
                'comment' => 'خدمة رائعة!',
                'rate' => 5,
                'client_id' => 1,
                'distributor_id' => 1,
                'status_id' => 1,
                'delivery_latitude' => 35.12345678,
                'delivery_longitude' => 36.12345678,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_date' => now()->toDateString(),
                'order_time' => now()->toTimeString(),
                'delivery_date' => now()->addDays(2)->toDateString(),
                'delivery_time' => '19:00:00',
                'note' => 'بدون بصل.',
                'comment' => null,
                'rate' => null,
                'client_id' => 2,
                'distributor_id' => null,
                'status_id' => 2,
                'delivery_latitude' => null,
                'delivery_longitude' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
