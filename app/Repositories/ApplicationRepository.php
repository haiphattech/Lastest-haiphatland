<?php
namespace App\Repositories;

use App\Models\Application;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ApplicationRepository extends AbstractRepository
{
    public function model(){
        return Application::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status = true)
    {
        return $this->model->where('status', $status)->get();
    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }

    //API FRONTEND
    public function getApplicationFooter($lang)
    {
        return $this->model->where([['lang', $lang], ['status', true]])->get();
    }
}
