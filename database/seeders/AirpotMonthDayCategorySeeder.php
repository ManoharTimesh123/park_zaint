<?php

namespace Database\Seeders;
use App\Models\AirpotMonthDayCategory;
use Illuminate\Database\Seeder;

class AirpotMonthDayCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entryfirst = [
            'airport_id'         => 1,
            'product_id'        => 3,
            'category_id'       => 2,
            'month'             => 'February',
            'date'              => 9,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        AirpotMonthDayCategory::updateOrCreate(['id' => 1], $entryfirst);

        //user  details
        $entrysecond = [
            'airport_id'         => 2,
            'product_id'        => 2,
            'category_id'       => 2,
            'month'             => 'February',
            'date'              => 5,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        AirpotMonthDayCategory::updateOrCreate(['id' => 2], $entrysecond);

        //user  details
        $entrythird = [
            'airport_id'         => 2,
            'product_id'        => 3,
            'category_id'       => 3,
            'month'             => 'January',
            'date'              => 4,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        AirpotMonthDayCategory::updateOrCreate(['id' => 3], $entrythird);
    }
}
