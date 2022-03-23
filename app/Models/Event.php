<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'cover',
        'place',
        'address',
        'start_time',
        'end_time',
        'description',
        'lang',
        'parent_lang',
        'created_by',
        'category_id',
        'status',
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
