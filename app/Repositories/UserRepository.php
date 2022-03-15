<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Support\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return User::class;
    }
    public function  getUsers()
    {
        return $this->model->get();
    }
}
