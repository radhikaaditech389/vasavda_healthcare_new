<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'tbl_contact_msg_list';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];
}