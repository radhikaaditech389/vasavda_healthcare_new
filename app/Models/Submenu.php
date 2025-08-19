<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = ['submenu_name', 'submenu_sequence', 'submenu_link', 'menu_id', 'is_displayed'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    use HasFactory;
}
