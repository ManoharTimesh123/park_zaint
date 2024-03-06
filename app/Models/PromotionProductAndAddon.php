<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Products;
use App\Models\Addons;
use App\Models\Promotions;
use Illuminate\Database\Eloquent\Model;

class  PromotionProductAndAddon extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'addons_id',
        'promotion_id',
        'is_exclude',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function addons()
    {
        return $this->belongsTo(Addons::class, 'addons_id', 'id');
    }

    public function promotions()
    {
        return $this->belongsTo(Promotions::class, 'promotion_id', 'id');
    }
}
