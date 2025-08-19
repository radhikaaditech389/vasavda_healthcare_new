<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
        'sequence',
        'link',
        'is_displayed'
    ];

    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'menu_id', 'id')->where('is_displayed', 1)->orderBy('submenu_sequence');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    use HasFactory;
}
