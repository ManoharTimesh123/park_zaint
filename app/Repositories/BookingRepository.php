<?php

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Addons;
use App\Models\AirportProductCategory;
use App\Models\AirpotMonthDayCategory;
use App\Models\Booking;
use App\Models\BookingPaymentInfo;
use App\Models\BookingProductAndAddon;
use App\Models\Note;
use App\Models\User;
use Carbon\Carbon;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


class BookingRepository implements BookingRepositoryInterface
{
    public $bookingModel;
    private $stripe;

    public function __construct(
        Booking $bookingModel
    ) {
        $this->bookingModel = $bookingModel;
        $this->stripe = new StripeClient(config('app.stripe_secret'));
    }

    /**
     * This function retrieves all airports.
     */
    public function getAllBookings()
    {
        return Booking::all();
    }

    /**
     * This function retrieves airport with there id.
     * @param int airportId
     */
    public function getBookingById(int $bookingId)
    {
        return Booking::with([
            'user', 'productAndAddon', 'notes', 'bookingpaymentinfo', 'airport',
        ])->where('id', '=', $bookingId)->first();
    }

    /**
     * Generate a new booking with the data provided.
     * @param int bookingDetails
     */
    public function createBooking(array $bookingDetails)
    {
        $productprice = [];
        $totalprice = [];
        $startDate = Carbon::parse($bookingDetails['travel_start_date']);
        $endDate = Carbon::parse($bookingDetails['travel_end_date']);

        $daysDifference = $startDate->diffInDays($endDate);

        $monthName = $startDate->format('F'); // Full month name
        $date = $startDate->format('d');  // Two-digit day (01-31)
        $monthdaycategory = AirpotMonthDayCategory::with('product')
        ->where('product_id', $bookingDetails['product_id'])
        ->where('airport_id', $bookingDetails['airport'])
        ->where('date', $date)
        ->where('month', $monthName)
        ->get();
        try {
            if (isset($monthdaycategory[0]) && isset($monthdaycategory[0]->category_id)) {
                $product = AirportProductCategory::where('category_id', $monthdaycategory[0]->category_id)
                ->where('no_of_days', $daysDifference)
                ->get('price');
    
                if (isset($product[0]->price)) {
                    $totalprice[] = $product[0]->price;
                    $product_priceid = $this->stripe->prices->create([
                        'unit_amount' => $product[0]->price,
                        'currency' => config('app.currency'),
                        'product' => $monthdaycategory[0]->product->strip_product_id,
                        'nickname' => $monthdaycategory[0]->product->name,
                        'metadata' => [
                            'product_type' => $monthdaycategory[0]->product->name . 'Product',
                        ],
                    ]);
            
                    $productprice[] = [
                        'price' => $product_priceid->id,
                        'quantity' => 1
                    ];
                }

                if (array_key_exists('addons_id', $bookingDetails) && !empty($bookingDetails['addons_id'])){
                    $addons = Addons::with('addons_options')
                    ->whereIn('id', $bookingDetails['addons_id'])
                    ->get()->toArray();
    
                    foreach ($addons as $addon) {
                        foreach($addon['addons_options'] as $option) {
                            if(isset($option['strip_price_id'])){
                                $productprice[] = [
                                    'price' => $option['strip_price_id'],
                                    'quantity' => 1
                                ];
                                $totalprice[] = $option['price'];
                            }
                        }
    
                    }
                }
                $user = User::where([
                    'email' => $bookingDetails['email'],
                ])->first();
        
                if ($user) {
                    $user->update([
                        'name' => $bookingDetails['name'],
                        'phone' => $bookingDetails['phone'],
                        'company_name' => $bookingDetails['company_name'],
                    ]);
                } else {
                    $user = User::create([
                        'name' => $bookingDetails['name'],
                        'email' => $bookingDetails['email'],
                        'phone' => $bookingDetails['phone'],
                        'company_name' => $bookingDetails['company_name'],
                        // 'password' => Str::random(10),
                        'password' => 'Admin@123',
                    ]);
                }
        
                $pkiGeneratedBookingId = 0;
                $pkiGeneratedBookingId = Booking::insertGetId([
                    'user_id' => $user->id,
                    'outbound_flight' => $bookingDetails['outbound_flight'],
                    'airport_id' => $bookingDetails['airport'],
                    'outbound_terminal_id' => $bookingDetails['outbound_terminal'],
                    'inbound_flight' => $bookingDetails['inbound_flight'],
                    'inbound_terminal_id' => $bookingDetails['inbound_terminal'],
                    'travel_start_date' => $bookingDetails['travel_start_date'],
                    'travel_end_date' => $bookingDetails['travel_end_date'],
                    'no_of_passengers' => $bookingDetails['no_of_passengers'],
                    'vehicle_details' => $bookingDetails['vehicle_details'],
                    'total_price' => array_sum($totalprice),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $paymentlink = $this->stripe->paymentLinks->create([
                    'line_items' => [
                        $productprice
                    ],
                    'allow_promotion_codes' => true,
                    'metadata' => [
                        'bookingid' => $pkiGeneratedBookingId
                    ]
                ]);

                $booking = BookingPaymentInfo::create([
                    'paymentlinks' => $paymentlink->url,
                    'booking_id' => $pkiGeneratedBookingId,
                    'status' => 'pending',
                    'totalamount' => array_sum($totalprice)
                ]);
                $payload = [];
                if ($pkiGeneratedBookingId != 0 && $bookingDetails['product_id'] != null) {
                    $temp = [
                        'booking_id' => $pkiGeneratedBookingId,
                        'product_id' => $bookingDetails['product_id'],
                        'addons_id' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    array_push($payload, $temp);
                }
                if ($pkiGeneratedBookingId != 0 && array_key_exists('addons_id', $bookingDetails) &&count($bookingDetails['addons_id']) != 0) {
                    foreach ($bookingDetails['addons_id'] as $id) {
                        $temp = [
                            'booking_id' => $pkiGeneratedBookingId,
                            'product_id' => null,
                            'addons_id' => $id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        array_push($payload, $temp);
                    }
                }
                try {
                    Mail::to($bookingDetails['email'])->send(new WelcomeEmail($bookingDetails['name'], 'Confirm Payment', $paymentlink->url));
                    BookingProductAndAddon::insert($payload);
                } catch (\Exception $ex) {
                    return ($ex->getMessage());
                }
                return true;
            } else {
                return trans('app.booking.product_not_found');
            }
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    /**
     * Update an existing airport and its terminals with the airport id ad updated data provided.
     * @param int bookingId, bookingDetails
     */
    public function updateBooking(int $bookingId, array $bookingDetails)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->outbound_flight = $bookingDetails['outbound_flight'];
        $booking->outbound_terminal_id = $bookingDetails['outbound_terminal'];
        $booking->inbound_flight = $bookingDetails['inbound_flight'];
        $booking->inbound_terminal_id = $bookingDetails['inbound_terminal'];
        $booking->no_of_passengers = $bookingDetails['no_of_passengers'];
        $booking->updated_at = now();
        $booking->save();

        $user = User::where('id', '=', $booking->user_id)->first();
        $user->name = $bookingDetails['name'];
        $user->phone = $bookingDetails['phone'];
        $user->company_name = $bookingDetails['company_name'];
        $user->updated_at = now();
        $user->save();

        return true;
    }

    /**
     * Soft delete airport and its terminals with airport id provided.
     * @param int airportId
     */
    public function deleteBookingById(int $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->delete();

        BookingProductAndAddon::where('booking_id', '=', $bookingId)->delete();

        return true;
    }

    /**
     * Add note.
     */
    public function addNote(string $description, int $bookingId)
    {
        return Note::insertGetId([
            'booking_id' => $bookingId,
            'created_by' => Auth::user()->id,
            'description' => $description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update note.
     */
    public function editNote(string $description, int $noteId)
    {
        $note = Note::where('id', '=', $noteId)->first();
        $note->description = $description;
        $note->updated_at = now();

        return $note->save();
    }

    /**
     * Delete note.
     */
    public function deleteNote(int $noteId)
    {
        return Note::where('id', '=', $noteId)->delete();
    }
}
