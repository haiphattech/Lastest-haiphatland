<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends AbstractRepository
{
    public function model()
    {
        return Category::class;
    }
    public function getCategories()
    {
        $data = [];
        $query =  $this->model->whereNull('parent_id')->orderBy('ID', 'DESC')->get();
        foreach ($query as $item):
            $data[] = $item;
            $que = $this->model->where('parent_id', $item['id'])->get();
            foreach ($que as $it):
                $data[] = $it;
            endforeach;
        endforeach;
        return $data;
    }
    public function getAllCategories($lang)
    {
        return $this->model->where([['lang', $lang],['status', true]])->get();
    }
    public function checkLangExist($lang, $category_id)
    {
        return $this->model->where([['lang', $lang], ['parent_lang', $category_id]])->first();
    }
    public function getCategoryByType($type, $lang, $status =  true)
    {
        return $query = $this->model->where([['status', $status],['type', $type],['lang', $lang]])->get();

    }
}
