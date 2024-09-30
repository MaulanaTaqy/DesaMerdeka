<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryCategory extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function meta_name()
    {
        return $this->belongsTo(MetaGalleryCategory::class, 'meta_gallery_category_id', 'id');
    }
}
