<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar',
        'display_home',
        'status',
        'published',
        'time_published',
        'lang',
        'parent_lang',
        'created_by',
        'category_id',
    ];
}
