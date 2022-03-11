<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'lang',
        'parent_lang',
        'status',
        'created_by',
        'project_id',
    ];


}
