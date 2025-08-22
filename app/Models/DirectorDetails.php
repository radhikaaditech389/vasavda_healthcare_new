<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorDetails extends Model
{
    protected $table = 'director_details';
    protected $fillable = [
        'facility_id',
        'name',
        'specialization',
        'skills',
        'languages',
        'bio',
        'image',
        'campaign_image',
        'campaigns',
        'training_image',
        'trainings',
        'conferences',
        'award_image',
        'awards',
        'media_presence',
        'charity_image',
        'community_charity_work',
        'membership_image',
        'memberships',
        'publications_talks'
    ];
}
