<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'create_by',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles');
    }
    public function staffs()
    {
        return $this->belongsToMany(Staff::class, 'role_staffs');
    }
}
