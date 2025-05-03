<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','attribute_option_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeOption()
    {
        return $this->belongsTo(AttributeOption::class, 'attribute_option_id');
    }
}