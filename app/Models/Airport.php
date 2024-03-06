<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Airport extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'cc_email',
        'description',
        'status',
    ];

    protected $attributes = [
        'slug' => null,
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function terminals()
    {
        return $this->hasMany(AirportTerminal::class);
    }
    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function airpotmonthdaycategory()
    {
        return $this->hasMany(AirpotMonthDayCategory::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
