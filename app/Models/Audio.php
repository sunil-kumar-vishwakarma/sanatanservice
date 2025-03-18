<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audio'; // Ensure this is set correctly

    protected $fillable = [
        'audio_name',
        'thumbnail_path',
        'audio_path',
        'pdf_path',
    ];
}
