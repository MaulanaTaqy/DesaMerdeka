<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory, Uuid, HasPermissions;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(MemberCategory::class);
    }

    public function member_type()
    {
        return $this->belongsTo(MemberType::class);
    }

    public function member_core()
    {
        return $this->belongsTo(Member::class, 'registered_by_member_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, "registered_by_member_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
