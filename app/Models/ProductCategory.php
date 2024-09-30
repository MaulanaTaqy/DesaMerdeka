<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Product;
use App\Models\MetaProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function meta_name()
    {
        return $this->belongsTo(MetaProductCategory::class, 'meta_product_category_id', 'id');
    }
}
