<?php

namespace App\Interfaces;

interface BookingRepositoryInterface
{
    public function getAllBookings();

    public function getBookingById(int $bookingId);

    public function createBooking(array $bookingData);

    public function updateBooking(int $bookingId, array $bookingData);

    public function deleteBookingById(int $bookingId);

    public function addNote(string $description, int $bookingId);

    public function editNote(string $description, int $noteId);

    public function deleteNote(int $noteId);
}
