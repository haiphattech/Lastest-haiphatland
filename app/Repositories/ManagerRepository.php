<?php
namespace App\Repositories;

use App\Models\Manager;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ManagerRepository extends AbstractRepository
{
    public function model(){
        return Manager::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status = true)
    {
        return $query = $this->model->where('status', $status)->get();

    }
    public function getManagerProjects($lang = 'vi')
    {
        return $this->model->where([['status', true],['lang', $lang]])->get();

    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
}
