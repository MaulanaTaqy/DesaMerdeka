<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetaEventCategory extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(EventCategory::class);
    }
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
