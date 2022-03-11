<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lang',
        'parent_lang',
        'status',
        'created_by'
    ];
}
