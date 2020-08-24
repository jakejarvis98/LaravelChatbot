<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'info_name',
        'event_name',
        'category',
        'industry',
        'actual_info',
        'keywords',
        'activity_date',
        'expiry_date',
        'related_agency',
        'numerical_value',
        'other_details',
        'enable'
    ];
}
