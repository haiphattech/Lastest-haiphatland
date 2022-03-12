<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleRepository extends AbstractRepository
{
    public function model(){
        return Role::class;
    }
}
