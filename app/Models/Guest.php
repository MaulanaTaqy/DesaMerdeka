<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\GuestEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guest_event()
    {
        return $this->hasMany(GuestEvent::class);
    }
    
}
