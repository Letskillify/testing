<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category_id',
        'sub_category_id',
        'brand_id',
        'description',
        'price',
        'currency',
        'discount_price',
        'unit',
        'stock_quantity',
        'is_featured',
        'is_new',
        'material',
        'dimensions',
        'weight',
        'colors',
        'sizes',
        'care_instructions',
        'images',
        'additional_features',
        'movement',
        'case_material',
        'band_material',
        'water_resistance',
        'dial_color',
        'case_diameter',
        'functions',
        'size',
        'artist',
        'edition_number',
        'frame',
        'type',
        'connectivity',
        'battery_life',
         'fragrance_family',
        'top_notes',
        'heart_notes',
        'base_notes',
        'origin',
        'roast_level',
        'flavor_profile',
        'packaging',
        'hardware'
    ];

    protected $casts = [
        'colors' => 'array',
        'sizes' => 'array',
        'images' => 'array',
        'additional_features' => 'array',
        'functions' => 'array',
        'top_notes' => 'array',
        'heart_notes' => 'array',
        'base_notes' => 'array',
        'flavor_profile' => 'array'
    ];

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }

    public function productAttribute(): HasMany {
        return $this->hasMany(ProductAttribute::class);
    }

    public function revenueFromPurchaseAndSaleOfProduct(): HasOne {
        return $this->hasOne(RevenueFromPurchaseAndSaleOfProduct::class);
    }

    public function productView(): HasOne {
        return $this->hasOne(ProductView::class);
    }

    public function discountPrice(): HasOne {
        return $this->hasOne(DiscountPrice::class);
    }

    public function review(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function cartItem(): HasMany {
        return $this->hasMany(CartItem::class);
    }
}
