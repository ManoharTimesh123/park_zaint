<?php

namespace App\Repositories;

use App\Interfaces\AirportRepositoryInterface;
use App\Models\Airport;
use App\Models\AirportTerminal;
use App\Models\Category;

class AirportRepository implements AirportRepositoryInterface
{
    public $airportModel;

    public function __construct(
        Airport $airportModel
    ) {
        $this->airportModel = $airportModel;
    }

    /**
     * This function retrieves all airports.
     */
    public function getAllAirports()
    {
        return Airport::with('terminals')->get();
    }

    /**
     * This function retrieves airport with there id.
     * @param int airportId
     */
    public function getAirportById(int $airportId)
    {
        return Airport::with('terminals')->where('id', '=', $airportId)->first();
    }

    /**
     * This function retrieves terminals with airport id.
     * @param int airportId
     */
    public function getTerminalsByAirportId(int $airportId)
    {
        $airportterminals = AirportTerminal::where('airport_id', '=', $airportId)->get();
        return compact('airportterminals');
    }

    /**
     * Generate a new airport and its terminals with data provided.
     * @param int airportDetails
     */
    public function createAirport(array $airportDetails)
    {
        $pkiGeneratedId = 0;

        $pkiGeneratedId = Airport::insertGetId([
            'name' => $airportDetails['airport_name'],
            'slug' => $airportDetails['airport_name'],
            'cc_email' => $airportDetails['cc_email'],
            'description' => $airportDetails['description'],
            'created_at' => now(),
            'updated_at' => now(),
            'status' => $airportDetails['airport_status'],
        ]);

        $payload = [];
        if ($pkiGeneratedId != 0 && $airportDetails['new_items'] != null) {
            foreach ($airportDetails['new_items'] as $data) {
                $temp = [
                    'airport_id' => $pkiGeneratedId,
                    'name' => $data['name'],
                    'shortname' => $data['shortname'],
                    'created_at' => now(),
                    'updated_at' => now(),
                    'status' => $data['status'],
                ];
                array_push($payload, $temp);
            }
        }

        AirportTerminal::insert($payload);

        return true;
    }

    /**
     * Update an existing airport and its terminals with the airport id ad updated data provided.
     * @param int airportId, airportDetails
     */
    public function updateAirport(int $airportId, array $airportDetails)
    {
        $airport = Airport::findOrFail($airportId);
        $airport->name = $airportDetails['airport_name'];
        $airport->slug = $airportDetails['airport_name'];
        $airport->cc_email = $airportDetails['cc_email'];
        $airport->description = $airportDetails['description'];
        $airport->updated_at = now();
        $airport->status = $airportDetails['airport_status'];
        $airport->save();

        if (isset($airportDetails['update_items'])) {
            foreach ($airportDetails['update_items'] as $data) {
                $terminal = AirportTerminal::where('id', '=', $data['id'])->first();
                $terminal->name = $data['name'];
                $terminal->shortname = $data['shortname'];
                $terminal->updated_at = now();
                $terminal->status = $data['status'];
                $terminal->save();
            }
        }

        $payload = [];
        if (isset($airportDetails['new_items'])) {
            foreach ($airportDetails['new_items'] as $data) {
                $temp = [
                    'airport_id' => $airportId,
                    'name' => $data['name'],
                    'shortname' => $data['shortname'],
                    'created_at' => now(),
                    'updated_at' => now(),
                    'status' => $data['status'],
                ];
                array_push($payload, $temp);
            }
        }

        AirportTerminal::insert($payload);

        return $airport;
    }

    /**
     * Soft delete airport and its terminals with airport id provided.
     * @param int airportId
     */
    public function deleteAirportById(int $airportId)
    {
        $airport = Airport::findOrFail($airportId);
        $airport->delete();

        AirportTerminal::where('airport_id', '=', $airportId)->delete();

        return $airport;
    }
}
