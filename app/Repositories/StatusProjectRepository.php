<?php
namespace App\Repositories;

use App\Models\Menu;
use App\Models\StatusProject;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\TypePermission;

class StatusProjectRepository extends AbstractRepository
{
    public function model(){
        return StatusProject::class;
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
