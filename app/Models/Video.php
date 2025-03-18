<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model {
    use HasFactory;

    protected $fillable = ['video_name', 'thumbnail_path', 'video_path','video_url'];
}

