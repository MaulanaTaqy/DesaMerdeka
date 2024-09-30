<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Service extends Model
{
    use HasFactory, Uuid;
    protected $guarded = [];

    public $incrementing = false;

    protected $keyType = 'string';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
}
