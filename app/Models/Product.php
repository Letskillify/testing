<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

     public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function views()
    {
        return $this->hasMany(ProductView::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}