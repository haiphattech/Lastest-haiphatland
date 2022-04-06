<?php
namespace App\Repositories;

use App\Models\Activity;
use App\Models\Recruit;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class RecruitRepository extends AbstractRepository
{
    public function model(){
        return Recruit::class;
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
    public function getDataShowHome($lang)
    {
        return $this->model->where([['lang', $lang], ['status', true],['display_home', true]])->orderBy('id')->get();
    }
    public function getDataApi($lang = 'vi')
    {
        return $this->model->where([['lang', $lang],['status', true]])->paginate(5);
    }
    public function getDataBuSlug($slug, $lang = 'vi')
    {
        return $this->model->where([['lang', $lang],['status', true], ['slug', $slug]])->first();
    }
    public function getDataByCategoryId($cate_id, $id)
    {
        return $this->model->where([['category_id', $cate_id], ['status', true], ['id', '!=', $id]])->orderBy('id', 'DESC')->limit(5)->get();
    }
}
