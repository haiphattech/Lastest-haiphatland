<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'cover',
        'video',
        'phone',
        'email',
        'address',
        'description',
        'quy_mo',
        'lang',
        'parent_lang',
        'tien_phong',
        'tieu_bieu',
        'display_home',
        'status',
        'published',
        'time_published',

        'created_by',
        'manager_id',
        'type_project_id',
        'status_project_id',
        'category_id',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
}
