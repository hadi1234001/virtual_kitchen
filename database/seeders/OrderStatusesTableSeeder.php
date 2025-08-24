<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesTableSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'قيد المراجعة',
            'قيد التحضير',
            'في الطريق',
            'تم التوصيل',
            'ملغي'
        ];

        foreach ($statuses as $status) {
            DB::table('order_statuses')->insert([
                'status_name' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
