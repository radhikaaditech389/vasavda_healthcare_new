<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'icon', 'title', 'order'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
