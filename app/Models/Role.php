<?php

namespace App\Models;

use App\Traits\Uuid;
use Spatie\Permission\Models\Role as Model;

class Role extends Model
{
    use Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];
}
