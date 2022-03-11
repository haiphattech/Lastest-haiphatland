<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'location',
        'content',
        'date_end',
        'time_published',
        'published',
        'display_home',
        'status',
        'created_by',
        'category_id',
    ];
}
