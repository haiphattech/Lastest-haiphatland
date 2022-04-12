<?php
namespace App\Repositories;

use App\Models\Introduce;
    use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class IntroduceRepository extends AbstractRepository
{
    public function model(){
        return Introduce::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status = true)
    {
        return $query = $this->model->where('status', $status)->get();

    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
    public function getDataApi($lang= 'vi')
    {
        return $this->model->where([['lang', $lang], ['status', true]])->orderBY('serial', 'ASC')->get();
    }
}
