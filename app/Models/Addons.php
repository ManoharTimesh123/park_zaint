<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Addons extends Model
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

    /**
     * Mutator function to set the 'slug' and 'name' attributes based on the provided name.
     *
     * @param string $value The value of the 'name' attribute.
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    /**
     * Relationship function to define a one-to-many relationship with AddonsOptions model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addons_options()
    {
        return $this->hasMany(AddonsOptions::class);
    }

    /**
     * Relationship function to define a one-to-many relationship with PromotionProductAndAddon model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PromotionProductAndAddon()
    {
        return $this->hasMany(PromotionProductAndAddon::class);
    }

    /**
     * Relationship function to define a one-to-many relationship with BookingProductAndAddon model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productAndAddon()
    {
        return $this->hasMany(BookingProductAndAddon::class);
    }

}
