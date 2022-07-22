<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'university_id','title','description','target_amount','cover_image', 'document','campaign_status',
    ];
}
