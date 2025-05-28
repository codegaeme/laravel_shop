<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
     protected $fillable = [
        'name', 'slug', 'description', 'thumbnail', 'category_id', 'is_variant', 'status'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
