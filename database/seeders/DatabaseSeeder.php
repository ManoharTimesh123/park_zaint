<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            ProductsSeeder::class,
            UserSeeder::class,
            AirportAndTerminalSeeder::class,
            TermAndConditionSeeder::class,
            AddonsSeeder::class,
            AddonsoptionsSeeder::class,
            CategorySeeder::class,
            AirpotMonthDayCategorySeeder::class,
            AirportProductCategorySeeder::class,
            BookingProductAndAddonSeeder::class
        ]);
    }
}
