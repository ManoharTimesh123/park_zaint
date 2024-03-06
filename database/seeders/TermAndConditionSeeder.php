<?php

namespace Database\Seeders;

use App\Models\TermsAndConditions;
use Illuminate\Database\Seeder;

class TermAndConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $termAndCondition = [
            'id'                => 1,
            'description'       => '<h3>terms and conditions description</h3>',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'id' => 1,
        ];

        TermsAndConditions::updateOrCreate($condition, $termAndCondition);
    }
}
