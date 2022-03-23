<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutU extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'favicon',
        'thumbnail',

        'company',
        'email',
        'address',
        'phone',
        'fax',
        'description',
        'meta_header',
        'meta_keywords',
        'meta_description',

        'video_intro',
        'facebook',
        'twitter',
        'youtube',

        'lang',
        'parent_lang',
        'created_by',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
}
