<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Guest;
use App\Models\GuestEvent;
use App\Models\EventBanner;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
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

    public function event_speaker()
    {
        return $this->hasMany(EventSpeaker::class);
    }

    public function event_sponsor()
    {
        return $this->hasMany(EventSponsor::class);
    }

    public function images()
    {
        return $this->hasMany(EventImage::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function member_type()
    {
        return $this->belongsTo(MemberType::class);
    }

    public function event_banner()
    {
        return $this->hasMany(EventBanner::class);
    }

    public function guest()
    {
        return $this->hasOne(Guest::class);
    }
    public function guest_event()
    {
        return $this->hasOne(GuestEvent::class);
    }
}
