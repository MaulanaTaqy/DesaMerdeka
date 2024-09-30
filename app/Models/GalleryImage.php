<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Gallery;
use App\Models\GalleryVideo;
use App\Models\GalleryCategory;
use App\Models\MetaGalleryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImage extends Model
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

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class);
    }

    public function meta_name()
    {
        return $this->belongsTo(MetaGalleryCategory::class, 'meta_gallery_category_id', 'id');
    }

}
