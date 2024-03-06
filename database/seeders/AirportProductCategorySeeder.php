<?php

namespace Database\Seeders;
use App\Models\AirportProductCategory;
use Illuminate\Database\Seeder;

class AirportProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrysecond = [];
        $entryfirst = [];
        $entrythird = [];
        $nodays = env('NOOFDAYS');
        for($i = 1; $i <= $nodays; $i++) {

            //category  details
            $entryfirst[] = [
                'category_id'       => 2,
                'no_of_days'        => $i,
                'price'             => rand(1, 100),
                'created_at'        => now(),
                'updated_at'        => now(),
                'deleted_at'        => null,
            ];
            //category  details
            $entrysecond[] = [
                'category_id'       => 1,
                'no_of_days'        => $i,
                'price'             => rand(1, 100),
                'created_at'        => now(),
                'updated_at'        => now(),
                'deleted_at'        => null,
            ];
    
            //category  details
            $entrythird[] = [
                'category_id'       => 3,
                'no_of_days'        => $i,
                'price'             => rand(1, 100),
                'created_at'        => now(),
                'updated_at'        => now(),
                'deleted_at'        => null,
            ];

        }
        AirportProductCategory::insert($entryfirst);
        AirportProductCategory::insert($entrysecond);
        AirportProductCategory::insert($entrythird);
    }
}
