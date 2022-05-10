<?php
namespace App\Repositories;

use App\Models\StatusProject;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class StatusProjectRepository extends AbstractRepository
{
    public function model(){
        return StatusProject::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($lang, $status = true)
    {
        return $this->model->where([['status', $status],['lang', $lang]])->get();

    }
    public function statusProjectAll($lang = 'vi')
    {
        return $this->model->orderBy('ID', 'DESC')->get();
    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
}
