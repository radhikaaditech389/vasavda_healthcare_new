<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = "educations";
    
    protected $fillable = [
        'about_section_id',
        'degree',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }

    use HasFactory;
}
