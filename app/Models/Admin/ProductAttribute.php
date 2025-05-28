<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
      protected $fillable = ['name'];

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'attribute_id');
    }
}
