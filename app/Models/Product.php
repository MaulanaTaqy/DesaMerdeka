<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\MemberType;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['member_name', 'approval_status'];

    public function category()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function member_type()
    {
        return $this->belongsTo(MemberType::class);
    }

    protected function getMemberNameAttribute($value)
    {
        return $this->member->name ?? 'Admin';
    }

    protected function getApprovalStatusAttribute($value)
    {
        return $this->is_approved == 1 ? 'Approved' : 'Not Approved';
    }

}
