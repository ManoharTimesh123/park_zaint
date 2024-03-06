<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entryfirst = [
            'name'              => 'Category1',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];
        Category::updateOrCreate(['id' => 1], $entryfirst);

        //category  details
        $entrysecond = [
            'name'              => 'Category2',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        Category::updateOrCreate(['id' => 2], $entrysecond);
        //category  details
        $entrythird = [
            'name'              => 'Category3',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
        ];

        Category::updateOrCreate(['id' => 3], $entrythird);
    }
}
