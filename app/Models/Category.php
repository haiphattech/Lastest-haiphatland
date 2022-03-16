<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function parentLanguage()
    {
        return $this->belongsTo(Category::class, 'parent_lang', 'id');
    }
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
}
