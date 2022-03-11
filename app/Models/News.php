<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'description',
        'content',
        'view',
        'noi_bat',
        'start',
        'status',
        'published',
        'time_published',
        'lang',
        'parent_lang',
        'created_by',
        'category_id',
    ];
}
