<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Promotions extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'amount',
        'expire',
        'minimum_spend',
        'maximum_spend',
        'use_limit',
        'user_limit',
        'strip_coupon_id',
        'stripe_promotion_id',
    ];

    public function PromotionProductAndAddon()
    {
        return $this->hasMany(PromotionProductAndAddon::class);
    }

    public function email_restricteds()
    {
        return $this->hasMany(EmailRestricted::class);
    }
}
