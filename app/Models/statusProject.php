<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lang',
        'parent_lang',
        'status',
        'created_by'
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
    public function parentLanguage()
    {
        return $this->belongsTo(statusProject::class, 'parent_lang', 'id');
    }
}
