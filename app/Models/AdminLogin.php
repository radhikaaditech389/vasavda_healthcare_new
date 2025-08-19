<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminLogin extends Authenticatable
{
    protected $table = 'tbl_adminlogin';

    protected $fillable = [
        'username',
        'password',
    ];
}
