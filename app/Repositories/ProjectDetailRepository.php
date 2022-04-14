<?php
namespace App\Repositories;

use App\Models\ProjectDetail;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ProjectDetailRepository extends AbstractRepository
{
    public function model(){
        return ProjectDetail::class;
    }
    public function getProjectDetailByProjectId($project_id)
    {
        return $this->model->where('project_id', $project_id)->get();
    }
}
