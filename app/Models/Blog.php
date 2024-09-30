<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];
    
    protected $appends = ['member_name'];

    public function category()
    {
        return $this->hasMany(BlogCategory::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function blogCategory()
    {
        return $this->hasMany(MetaBlogCategory::class, "id", "meta_blog_category_id");
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected function getMemberNameAttribute($value)
    {
        return $this->member->name ?? 'Admin';
    }
}
