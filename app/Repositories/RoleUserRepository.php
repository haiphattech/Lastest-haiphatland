<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use App\Models\RoleUser;

class RoleUserRepository extends AbstractRepository
{
    public function model(){
        return RoleUser::class;
    }
    public function checkPermission($user_id, $role_id)
    {
        $query = $this->model->where('user_id', $user_id)->where('role_id', $role_id)->first();
        return $query ? true : false;
    }
}
