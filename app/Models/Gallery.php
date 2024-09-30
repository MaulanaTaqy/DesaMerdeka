<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(GalleryCategory::class);
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
    public function videos()
    {
        return $this->hasMany(GalleryVideo::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function meta_name()
    {
        return $this->hasMany(MetaGalleryCategory::class, 'meta_gallery_category_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
