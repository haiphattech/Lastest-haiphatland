<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Activies\ActivetyResource;
use App\Http\Resources\Events\EventResource;
use App\Models\Event;
use App\Models\Menu;
use App\Http\Resources\Menus\MenuCollection;
use App\Http\Resources\Menus\MenuResource;
use App\Http\Resources\Projects\ProjectResource;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\ImageRepository as ImageRepo;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository as MenuRepo;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\ActivityRepository as ActivityRepo;
use App\Repositories\EventRepository as EventRepo;
use App\Repositories\AboutURepository as AboutURepo;
use App\Repositories\ApplicationRepository as ApplicationRepo;

class HomeController extends Controller
{
    protected $categoryRepo;
    protected $imageRepo;
    protected $menuRepo;
    protected $projectRepo;
    protected $activityRepo;
    protected $eventRepo;
    protected $aboutURepo;
    protected $applicationRepo;

    public function __construct(ApplicationRepo $applicationRepo, AboutURepo $aboutURepo, EventRepo $eventRepo, ActivityRepo $activityRepo, CategoryRepo $categoryRepo, ImageRepo $imageRepo, MenuRepo $menuRepo, ProjectRepo $projectRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo    = $imageRepo;
        $this->menuRepo     = $menuRepo;
        $this->projectRepo  = $projectRepo;
        $this->activityRepo = $activityRepo;
        $this->eventRepo    = $eventRepo;
        $this->aboutURepo   = $aboutURepo;
        $this->applicationRepo   = $applicationRepo;
    }
    public function getDataHome(Request $request, $lang='vi')
    {
        try {
            $data = [
                'menu' => [],
                'project_header' => [],
                'project_tien_phong' => [],
                'project_tieu_bieu' => [],
                'activities' => [],
                'events' => [],
                'aboutU' => [],
                'applications' => [],
            ];
            $menu = $this->menuRepo->getMenuByLang($lang);
            if($menu)
                $data['menu'] = new MenuResource($menu);

            $project_header = $this->projectRepo->getProjectShowHome($lang);
            if($project_header)
                $data['project_header'] = new ProjectResource($project_header);
            $project_tieu_bieu = $this->projectRepo->getProjectTieuBieu($lang);

            if($project_tieu_bieu)
                $data['project_tieu_bieu'] = new ProjectResource($project_tieu_bieu);

            $project_tien_phong = $this->projectRepo->getProjectTienPhong($lang);
            if($project_tien_phong)
                $data['project_tien_phong'] = new ProjectResource($project_tien_phong);

            $activities = $this->activityRepo->getDataShowHome($lang);
            if(!empty($activities))
                $data['activities'] = ActivetyResource::collection($activities);

            $events = $this->eventRepo->getEventShowHome($lang);
            if(!empty($events))
                $data['events'] = EventResource::collection($events);
            return response()->json([
                "success" => 200,
                "message" => "Success",
                "data" =>  $data
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                "success" => 500,
                "message" => "Error",
                "data" =>  []
            ]);
        }

    }
    public function getDataFooter(Request $request, $lang='vi')
    {
        try {
            $data = [
                'aboutU' => [],
                'applications' => [],
            ];
            $aboutU = $this->aboutURepo->getAboutUFooter($lang);
            if($aboutU)
                $data['aboutU'] = $aboutU;
            $applications = $this->applicationRepo->getApplicationFooter($lang);
            if(!empty($applications))
                $data['applications'] = $applications;
            return response()->json([
                "success" => 200,
                "message" => "Success",
                "data" =>  $data
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                "success" => 500,
                "message" => "Error",
                "data" =>  []
            ]);
        }

    }
}
