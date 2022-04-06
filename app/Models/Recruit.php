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
        'file',
        'date_end',
        'time_published',
        'published',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
