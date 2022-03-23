<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_company',
        'avatar',
        'phone',
        'fax',
        'email',
        'address',
        'description',
        'lang',
        'parent_lang',
        'created_by',
        'status',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
    public function parentLanguage()
    {
        return $this->belongsTo(Investor::class, 'parent_lang', 'id');
    }
}
