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
        'slug',
        'display_home',
        'status',
        'published',
        'time_published',
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
    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('page', 'ASC');
    }
}
