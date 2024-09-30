<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Uuid;
use App\Models\Guest;
use App\Models\Permission;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuid, HasRoles, CanResetPassword, HasPermissions;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function status_user()
    {
        return $this->belongsTo(StatusUser::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function guest()
    {
        return $this->hasOne(Guest::class);
    }
}
