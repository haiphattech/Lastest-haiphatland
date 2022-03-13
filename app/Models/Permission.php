<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'key',
        'user_id',
        'type_permission_id',
        'status'
    ];
    public function permissionRole()
    {
        return $this->belongsTo(PermissionRole::class);
    }
    public function typePermission()
    {
        return $this->belongsTo(TypePermission::class, 'type_permission_id');
    }


}
