<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class AirportProductCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    protected $table = 'airport_product_categorys';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'no_of_days',
        'price'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
