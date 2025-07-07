<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalizeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'zodiac_sign',
        'date_of_birth',
        'time_of_birth',
        'place_of_birth',
        'current_location',
        'nakshatraId',
        'lat',
        'lon',
        'tz'
    ];
}
