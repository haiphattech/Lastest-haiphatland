<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use App\Models\RoleUser;

class RoleUserRepository extends AbstractRepository
{
    public function model(){
        return RoleUser::class;
    }

}
