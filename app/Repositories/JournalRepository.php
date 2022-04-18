<?php
namespace App\Repositories;

use App\Models\Journal;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class JournalRepository extends AbstractRepository
{
    public function model(){
        return Journal::class;
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
    public function getListJournals($lang = 'vi')
    {
        return $this->model->where([['lang', $lang], ['status', true]])->get();
    }
    public function getJournalBySlug($slug, $lang = 'vi')
    {
        return $this->model->where([['lang', $lang], ['status', true], ['slug', $slug]])->first();
    }
}
