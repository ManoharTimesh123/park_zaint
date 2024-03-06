<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class AirpotMonthDayCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    protected $table = 'airpot_month_day_categorys';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'airport_id',
        'product_id',
        'month',
        'date'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
