<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'project_id',
        'journal_id',
        'category_id',
        'page',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
}
