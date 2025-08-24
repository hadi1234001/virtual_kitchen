<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PricesTableSeeder extends Seeder
{
    public function run(): void
    {
        Price::create([
            'person_number' => 1,
            'price' => 15000.00,
            'discount' => null,
            'plate_id' => 1,
        ]);

        Price::create([
            'person_number' => 2,
            'price' => 28000.00,
            'discount' => 10,
            'plate_id' => 1,
        ]);

        Price::create([
            'person_number' => 4,
            'price' => 50000.00,
            'discount' => 15,
            'plate_id' => 2,
        ]);
    }
}
