<?php
namespace App\Repositories;

use App\Models\Introduce;
use App\Models\IntroduceDetail;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class IntroduceDetailRepository extends AbstractRepository
{
    public function model(){
        return IntroduceDetail::class;
    }
    public function getData($introduce_id)
    {
        return $this->model->where('introduce_id', $introduce_id)->orderBy('ID', 'DESC')->paginate();
    }
    public function getByStatus($status = true)
    {
        return $query = $this->model->where('status', $status)->get();

    }
    public function checkLangExist($lang, $parent_lang)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $parent_lang]])->first();
    }
}
