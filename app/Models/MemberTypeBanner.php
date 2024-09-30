<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\MemberType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberTypeBanner extends Model
{
    use HasFactory, Uuid;
    
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function member_type(){
        return $this->belongsTo(MemberType::class);
    }
}
