<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'link', 'menu_id', 'show_on_home'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    use HasFactory;
}
