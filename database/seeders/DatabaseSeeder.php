<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatesTableSeeder::class,
            AdminsTableSeeder::class,
            VehiclesTableSeeder::class,
            TypesTableSeeder::class,
            SubTypesTableSeeder::class,
            IngredientsTableSeeder::class,
            ChefsTableSeeder::class,
            DistributorsTableSeeder::class,
            PlatesTableSeeder::class,
            PricesTableSeeder::class,
            OrderStatusesTableSeeder::class,
            ClientsTableSeeder::class,
            CompetitionsTableSeeder::class,
            CompetitionChefsTableSeeder::class,
            CompetitionClientsRatingSeeder::class,
            IngredientsCompetitionsTableSeeder::class,
            OrdersTableSeeder::class,

            OrderPlatesTableSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
