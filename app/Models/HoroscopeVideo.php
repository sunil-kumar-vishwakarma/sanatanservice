<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoroscopeVideo extends Model
{
    use HasFactory;
    protected $fillable = ['video_title', 'cover_image','video_url'];
}
