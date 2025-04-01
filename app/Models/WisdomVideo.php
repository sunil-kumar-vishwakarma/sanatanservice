<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisdomVideo extends Model
{
    use HasFactory;
    protected $fillable = ['video_name', 'thumbnail_path', 'video_path','language', 'video_option','video_url'];
}
