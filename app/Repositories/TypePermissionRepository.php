<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\TypePermission;

class TypePermissionRepository extends AbstractRepository
{
    public function model(){
        return TypePermission::class;
    }
    public function getTypePermissions()
    {
        return $this->model->paginate();
    }
    public function getTypePermissionByStatus($status)
    {
        return $query = $this->model->where('status', $status)->get();

    }
}
