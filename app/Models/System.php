<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar',
        'address',
        'lang',
        'status',
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
