<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'قيد المراجعة',
            'قيد التحضير',
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
