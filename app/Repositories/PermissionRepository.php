<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;

class PermissionRepository extends AbstractRepository
{
    public function model(){
        return Permission::class;
    }

    public function getPermissions()
    {
        return $query = $this->model->orderBy('ID', 'DESC')->paginate();

    }
    public function getPermissionByStatus($status)
    {
        return $query = $this->model->where('status', $status)->get();

    }
}
