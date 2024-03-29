<?php
namespace App\Repositories;

use App\Models\Project;
use App\Models\StatusProject;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ProjectRepository extends AbstractRepository
{
    public function model(){
        return Project::class;
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
    //Thống kê
    public function projectAll($lang)
    {
        return $this->model->where([['lang', $lang]])->orderBy('id', 'DESC')->get();
    }
    //API FRONTEND
    public function getProjectShowHome($lang)
    {
        return $this->model->where([['lang', $lang], ['display_home', true]])->first();
    }
    public function getProjectTienPhong($lang)
    {
        return $this->model->where([['lang', $lang], ['tien_phong', true]])->first();
    }
    public function getProjectTieuBieu($lang)
    {
        return $this->model->where([['lang', $lang], ['tieu_bieu', true]])->first();
    }
    public function getListProjectTieuBieus($lang)
    {
        return $this->model->where([['lang', $lang], ['tieu_bieu', true]])->orderBy('id', 'DESC')->limit(6)->get();
    }
    public function getAllProjects($status = true, $lang = 'vi')
    {
        return $this->model->where([['status', $status],['lang', $lang]])->orderBy('id', 'DESC')->paginate(8);
    }
    public function getAllProjectByCategoryId($category_id, $status = true, $lang = 'vi')
    {
        return $this->model->where([['status', $status],['lang', $lang],['category_id', $category_id]])->orderBy('id', 'DESC')->paginate(8);
    }
    public function getProjectBySlugAndCategoryId($slug, $category_id, $lang = 'vi')
    {
        return $this->model->where([['status', true],['lang', $lang],['slug', $slug], ['category_id', $category_id]])->first();
    }
}
