<?php
namespace App\Repositories;

use App\Models\Event;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class EventRepository extends AbstractRepository
{
    public function model(){
        return Event::class;
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
    public function getEventShowHome($lang)
    {
        $time_current = date('Y-m-d H:i:s');
        return $this->model->where([['lang', $lang],['start_time', '<=', $time_current]])->orderBy('start_time', 'DESC')->limit(4)->get();
    }
}
