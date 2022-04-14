<?php
namespace App\Repositories;

use App\Models\ProjectNews;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ProjectNewsRepository extends AbstractRepository
{
    public function model(){
        return ProjectNews::class;
    }
    public function getData($project_id)
    {
        return $this->model->where('project_id', $project_id)->pluck('news_id')->toArray();
    }


}
