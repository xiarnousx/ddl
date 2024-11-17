<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 1;
    const ROLE_PRACTICE = 2;
    const ROLE_PROVIDER = 3;
    const ROLE_BILLER = 4;

    protected $fillable = [
        'id',
        'name',
        'slug',
    ];
}
