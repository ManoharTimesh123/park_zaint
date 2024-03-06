<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingProductAndAddon extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bookings_products_and_addons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'product_id',
        'addons_id',
    ];

    public function bookings()
    {
        return $this->belongsTo(Booking::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }

    public function addons()
    {
        return $this->belongsTo(Addons::class,'addons_id','id');
    }
}
