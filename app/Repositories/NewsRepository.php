<?php
namespace App\Repositories;

use App\Models\Event;
use App\Models\News;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class NewsRepository extends AbstractRepository
{
    public function model(){
        return News::class;
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

    public function getNews($cate_id)
    {
        return $this->model->where([['category_id', $cate_id], ['status', true]])->paginate(8);
    }
}
