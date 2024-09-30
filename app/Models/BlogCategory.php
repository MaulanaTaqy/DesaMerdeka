<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function meta_name()
    {
        return $this->belongsTo(MetaBlogCategory::class, 'meta_blog_category_id', 'id');
    }
}
