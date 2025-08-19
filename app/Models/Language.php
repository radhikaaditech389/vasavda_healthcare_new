<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'about_section_id',
        'name',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }

    use HasFactory;
}
