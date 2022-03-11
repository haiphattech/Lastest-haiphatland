<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'favicon',
        'thumbnail',
        'company',
        'email',
        'address',
        'phone',
        'fax',
        'meta_header',
        'meta_keywords',
        'meta_description',
        'video_intro',
        'facebook',
        'twitter',
        'youtube',
        'lang',
        'parent_lang',
        'created_by',
    ];
}
