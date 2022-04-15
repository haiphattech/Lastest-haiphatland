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
        'design',
        'sales_policy',
        'list_video',
        'lang',
        'parent_lang',
        'tien_phong',
        'tieu_bieu',
        'display_home',
        'status',
        'published',
        'time_published',
        'province',

        'created_by',
        'manager_id',
        'type_project_id',
        'status_project_id',
        'category_id',
        'investor_id'
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function news()
    {
        return $this->belongsToMany(News::class, 'project_news');
    }
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function statusProject()
    {
        return $this->belongsTo(statusProject::class);
    }
    public function projectDetails()
    {
        return $this->hasMany(ProjectDetail::class,'project_id', 'id');
    }
    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
