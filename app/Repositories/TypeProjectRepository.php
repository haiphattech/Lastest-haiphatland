<?php
namespace App\Repositories;

use App\Models\TypeProject;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class TypeProjectRepository extends AbstractRepository
{
    public function model(){
        return TypeProject::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status)
    {
        return $query = $this->model->where('status', $status)->get();

    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
}
