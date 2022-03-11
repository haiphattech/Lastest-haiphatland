<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'avatar',
        'description',
        'parent_id',
        'serial',
        'lang',
        'parent_lang',
        'type',
        'status',
        'created_by'
    ];
}
