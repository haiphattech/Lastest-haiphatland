<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Http\Resources\ProjectResource;
use App\Models\Menu;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\ImageRepository as ImageRepo;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository as MenuRepo;
use App\Repositories\ProjectRepository as ProjectRepo;

class HomeController extends Controller
{
    protected $categoryRepo;
    protected $imageRepo;
    protected $menuRepo;
    protected $projectRepo;
    public function __construct(CategoryRepo $categoryRepo, ImageRepo $imageRepo, MenuRepo $menuRepo, ProjectRepo $projectRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo = $imageRepo;
        $this->menuRepo = $menuRepo;
        $this->projectRepo = $projectRepo;
    }
    public function getHearder()
    {
        $lang = 'vi';
        $menu = $this->menuRepo->getMenuByLang($lang);
//        $project_header = $this->projectRepo->getProjectShowHome($lang);
        $data['menu'] = MenuResource::collection($menu);
//        $data['project_header'] = ProjectResource::collection($project_header);
        return response()->json([
            "success" => 200,
            "message" => "Success.",
            "data" =>  $data
        ]);
    }
}
