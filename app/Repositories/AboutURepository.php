<?php
namespace App\Repositories;

use App\Models\AboutU;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class AboutURepository extends AbstractRepository
{
    public function model(){
        return AboutU::class;
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
    public function getAboutUFooter($lang)
    {
        return $this->model->where([['lang', $lang]])->first();
    }
}
