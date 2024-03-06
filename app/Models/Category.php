<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    protected $table = 'categorys';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function airpotMonthDayCategory()
    {
        return $this->hasMany(AirpotMonthDayCategory::class);
    }

    public function airportproductcategory()
    {
        return $this->hasMany(AirportProductCategory::class);
    }
}
