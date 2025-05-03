<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_amount',
        'type',
        'valid_from',
        'valid_until',
        'is_active',
    ];

    public function orderByCoupon(): HasMany {
        return $this->hasMany(Order::class);
    }
}
