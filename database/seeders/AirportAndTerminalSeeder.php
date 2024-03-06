<?php

namespace Database\Seeders;

use App\Models\Airport;
use App\Models\AirportTerminal;
use Illuminate\Database\Seeder;

class AirportAndTerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First airport with 2 terminals
        $airport = [
            'id'                => 1,
            'name'              => 'Airport 1',
            'slug'              => 'airport-1',
            'cc_email'          => 'airport@one.com',
            'description'       => '<h3>airport one description</h3>',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'cc_email' => 'airport@one.com',
        ];
        Airport::updateOrCreate($condition, $airport);

        $airportTerminal = [
            'id'                => 1,
            'airport_id'        => 1,
            'name'              => 'AOne Term 1',
            'shortname'         => 'AOT1',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'shortname' => 'AOT1',
        ];
        AirportTerminal::updateOrCreate($condition, $airportTerminal);
        $airportTerminal = [
            'id'                => 2,
            'airport_id'        => 1,
            'name'              => 'AOne Term 2',
            'shortname'         => 'AOT2',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'shortname' => 'AOT2',
        ];
        AirportTerminal::updateOrCreate($condition, $airportTerminal);

        // Second airport with 2 terminals
        $airport = [
            'id'                => 2,
            'name'              => 'Airport 2',
            'slug'              => 'airport-2',
            'cc_email'          => 'airport@two.com',
            'description'       => '<h3>airport two description</h3>',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'cc_email' => 'airport@two.com',
        ];
        Airport::updateOrCreate($condition, $airport);

        $airportTerminal = [
            'id'                => 3,
            'airport_id'        => 2,
            'name'              => 'ATwo Term 1',
            'shortname'         => 'ATT1',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'shortname' => 'ATT1',
        ];
        AirportTerminal::updateOrCreate($condition, $airportTerminal);
        $airportTerminal = [
            'id'                => 4,
            'airport_id'        => 2,
            'name'              => 'ATwo Term 2',
            'shortname'         => 'ATT2',
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null,
            'status'            => 1,
        ];
        $condition = [
            'shortname' => 'ATT2',
        ];
        AirportTerminal::updateOrCreate($condition, $airportTerminal);
    }
}
