<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingProductAndAddon;
use Illuminate\Database\Seeder;

class BookingProductAndAddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First booking data
        $booking = [
            'id'                    => 1,
            'user_id'               => 3,
            'outbound_flight'       => 'Flight abc123',
            'airport_id'   => 1,
            'outbound_terminal_id'  => 1,
            'inbound_flight'        => 'Flight cba321',
            'inbound_terminal_id'   => 2,
            'travel_start_date'     => now(),
            'travel_end_date'       => now(),
            'no_of_passengers'      => 4,
            'vehicle_details'       => json_encode([[
                "color" => "black",
                "maker"=>"mercedes",
                "model"=>"g-class",
                "reg_no"=>"uk07"
            ]]),
            'total_price'           => 100,
            'created_at'            => now(),
            'updated_at'            => now(),
            'deleted_at'            => null,
        ];
        $condition = [
            'outbound_flight'       => 'Flight abc123',
        ];
        Booking::updateOrCreate($condition, $booking);
        $product = [
            'id'         => 1,
            'booking_id' => 1,
            'product_id' => 1,
            'addons_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $condition = [
            'id' => 1,
        ];
        BookingProductAndAddon::updateOrCreate($condition, $product);
        $addon = [
            'id'         => 2,
            'booking_id' => 1,
            'product_id' => null,
            'addons_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $condition = [
            'id' => 2,
        ];
        BookingProductAndAddon::updateOrCreate($condition, $addon);

        // Second booking data
        $booking = [
            'id'                    => 2,
            'user_id'               => 3,
            'outbound_flight'       => 'Flight xyz789',
            'airport_id'   => 2,
            'outbound_terminal_id'  => 2,
            'inbound_flight'        => 'Flight zyx987',
            'inbound_terminal_id'   => 1,
            'travel_start_date'     => now(),
            'travel_end_date'       => now(),
            'no_of_passengers'      => 2,
            'vehicle_details'       => json_encode([[
                    "color" => "black",
                    "maker"=>"mercedes",
                    "model"=>"g-class",
                    "reg_no"=>"uk07"
                ]]),
            'total_price'           => 150,
            'created_at'            => now(),
            'updated_at'            => now(),
            'deleted_at'            => null,
        ];
        $condition = [
            'outbound_flight'       => 'Flight xyz789',
        ];
        Booking::updateOrCreate($condition, $booking);
        $product = [
            'id'         => 3,
            'booking_id' => 2,
            'product_id' => 2,
            'addons_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $condition = [
            'id' => 3,
        ];
        BookingProductAndAddon::updateOrCreate($condition, $product);
        $addon = [
            'id'         => 4,
            'booking_id' => 2,
            'product_id' => null,
            'addons_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $condition = [
            'id' => 4,
        ];
        BookingProductAndAddon::updateOrCreate($condition, $addon);
    }
}
