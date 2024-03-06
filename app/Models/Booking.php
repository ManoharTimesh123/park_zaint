<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'outbount_flight',
        'airport_id',
        'outbound_terminal_id',
        'inbound_flight',
        'inbound_airport_id',
        'inbound_terminal_id',
        'vehicle_reg_no',
        'vehicle_maker',
        'vehicle_model',
        'vehicle_color',
        'no_of_passengers',
        'travel_start_date',
        'travel_end_date',
        'total_price',
    ];

    protected $casts = [
        'vehicle_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class)->with('terminals');
    }

    public function productAndAddon()
    {
        return $this->hasMany(BookingProductAndAddon::class)->with('products');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function bookingpaymentinfo()
    {
        return $this->hasMany(BookingPaymentInfo::class);
    }
}
