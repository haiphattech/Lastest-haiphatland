<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'description',
        'content',
        'display_home',
        'status',
        'lang',
        'parent_lang',
        'created_by',
        'category_id',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
}
