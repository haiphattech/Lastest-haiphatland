<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_font',
        'title',
        'avatar',
        'description',
        'lang',
        'parent_lang',
        'created_by',
        'category_id',
    ];

}
