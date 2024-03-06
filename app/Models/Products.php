<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\PromotionProductAndAddon;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'slug',
        'strip_product_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    public function promotionProducts()
    {
        return $this->hasMany(PromotionProductAndAddon::class, 'id', 'product_id');
    }

    public function AirportProductCategory()
    {
        return $this->hasMany(AirportProductCategory::class,'id','product_id');
    }

    public function categorys()
    {
        return $this->hasMany(Category::class);
    }

    public function productAndAddon()
    {
        return $this->hasMany(BookingProductAndAddon::class);
    }
}
