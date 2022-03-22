<?php
namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\TypePermission;

class MenuRepository extends AbstractRepository
{
    public function model(){
        return Menu::class;
    }
    public function getMenus()
    {
        return $this->model->orderBy('ID', 'DESC')->paginate();
    }
    public function getMenuByStatus($status)
    {
        return $query = $this->model->where('status', $status)->get();

    }
    public function getMenuByLang($lang)
    {
        return $this->model->where([['status', true],['lang', $lang]])->first();
    }
    public function checkLangExist($lang, $menu_id)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $menu_id]])->first();
    }
}
