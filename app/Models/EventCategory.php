<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Event;
use App\Models\MetaEventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventCategory extends Model
{

    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function meta_name()
    {
        return $this->belongsTo(MetaEventCategory::class, 'meta_event_category_id', 'id');
    }
}
