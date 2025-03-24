<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_image',
        'from_date',
        'to_date',
        'banner_type',
        'status',
    ];
}
