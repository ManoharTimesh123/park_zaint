<?php

namespace App\Interfaces;

interface AirportRepositoryInterface
{
    public function getAllAirports();

    public function getAirportById(int $airportId);

    public function getTerminalsByAirportId(int $airportId);

    public function createAirport(array $airportName);

    public function updateAirport(int $airportId, array $airportName);

    public function deleteAirportById(int $airportId);
}
