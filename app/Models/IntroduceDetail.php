<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroduceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'avatar',
        'description',
        'lang',
        'parent_lang',
        'created_by',
        'introduce_id',
    ];

}
