<?php
namespace App\Repositories;

use App\Models\Event;
use App\Models\News;
use App\Models\System;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class SystemRepository extends AbstractRepository
{
    public function model(){
        return System::class;
    }
    public function getData()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status = true, $lang ='vi')
    {
        return $this->model->where([['status', $status],['lang', $lang]])->get();
    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
    public function newsAll($lang = 'vi')
    {
        return $this->model->where('lang', $lang)->orderBy('id', 'DESC')->get();
    }
    public function getSystemByCategoryId($cate_id)
    {
        return $this->model->where([['category_id', $cate_id], ['status', true]])->paginate(5);
    }

}
