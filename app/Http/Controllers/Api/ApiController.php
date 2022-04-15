<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Activies\ActivetyResource;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Events\EventResource;
use App\Http\Resources\Introduces\IntroduceResource;
use App\Http\Resources\News\NewsResource;
use App\Http\Resources\Menus\MenuResource;
use App\Http\Resources\Projects\ProjectCollection;
use App\Http\Resources\Projects\ProjectResource;
use App\Http\Resources\Recruits\RecruitCollection;
use App\Http\Resources\Recruits\RecruitResource;
use App\Http\Resources\Systems\SystemCollection;
use App\Http\Resources\Systems\SystemResource;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\ImageRepository as ImageRepo;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository as MenuRepo;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\ActivityRepository as ActivityRepo;
use App\Repositories\EventRepository as EventRepo;
use App\Repositories\AboutURepository as AboutURepo;
use App\Repositories\ApplicationRepository as ApplicationRepo;
use App\Repositories\NewsRepository as NewsRepo;
use App\Repositories\SystemRepository as SystemRepo;
use App\Repositories\RecruitRepository as RecruitRepo;
use App\Repositories\IntroduceRepository as IntroduceRepo;

class ApiController extends Controller
{
    protected $categoryRepo;
    protected $imageRepo;
    protected $menuRepo;
    protected $projectRepo;
    protected $activityRepo;
    protected $eventRepo;
    protected $aboutURepo;
    protected $newsRepo;
    protected $systemRepo;
    protected $applicationRepo;
    protected $recruitRepo;
    protected $introduceRepo;

    public function __construct(IntroduceRepo $introduceRepo, RecruitRepo $recruitRepo, SystemRepo $systemRepo, NewsRepo $newsRepo,ApplicationRepo $applicationRepo, AboutURepo $aboutURepo, EventRepo $eventRepo, ActivityRepo $activityRepo, CategoryRepo $categoryRepo, ImageRepo $imageRepo, MenuRepo $menuRepo, ProjectRepo $projectRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo    = $imageRepo;
        $this->menuRepo     = $menuRepo;
        $this->projectRepo  = $projectRepo;
        $this->activityRepo = $activityRepo;
        $this->eventRepo    = $eventRepo;
        $this->aboutURepo   = $aboutURepo;
        $this->newsRepo     = $newsRepo;
        $this->systemRepo   = $systemRepo;
        $this->applicationRepo   = $applicationRepo;
        $this->recruitRepo   = $recruitRepo;
        $this->introduceRepo = $introduceRepo;
    }
    public function index($cate_slug, $slug = '')
    {
        $data = [];
        $category = $this->categoryRepo->getCategoryBySlug($cate_slug);
        if(!$category){
            return response()->json([
                "success" => 404,
                "message" => "Not Found...",
                "data" =>  []
            ]);
        }
        $data['category'] =  new CategoryResource($category);
        switch ($category['type']) {
            case 'news':
                if($category['parent_id']){
                    $list_categories = $this->categoryRepo->getCategoryByParentId($category['parent_id']);
                }else{
                    $list_categories = $this->categoryRepo->getCategoryByParentId($category['id']);
                }
                if(empty($list_categories)):
                    return response()->json([
                        "success" => 404,
                        "message" => "Not Found...",
                        "data" =>  []
                    ]);
                endif;
                if($slug) {
                    $news = $this->newsRepo->getNewsBySlugAndCateId($slug, $category['id']);
                    if (!$news) {
                        return response()->json([
                            "success" => 404,
                            "message" => "Not Found...",
                            "data" => []
                        ]);
                    }
                    $data['news'] = new NewsResource($news);
                    $list_news = $this->newsRepo->getNewByCategoryId($category['id'], $news['id']);
                    $data['relates'] = NewsResource::collection($list_news);
                }else {
                    $data['list_categories'] = CategoryResource::collection($list_categories);
                    $data['list_news'] = NewsResource::collection($this->newsRepo->getNews($category['id']));
                }
                break;
            case 'activities':
                $data['category'] = new CategoryResource($category);
                $activities = $this->activityRepo->getDataApi();
                $data['list_activities'] = ActivetyResource::collection($activities);
                if($slug){
                    $activity = $this->activityRepo->getDataBuSlug($slug);
                    $data['activity'] = new ActivetyResource($activity);
                }
                break;
            case 'system':
                $data['list_categories'] = CategoryResource::collection($this->categoryRepo->getCategoryByParentId($category['parent_id']));
                $data['systems'] =  new SystemCollection($this->systemRepo->getSystemByCategoryId($category['id']));
                $data['category'] = new CategoryResource($category);
                break;
            case 'recruit':
                $data['list_recruits'] = new RecruitCollection($this->recruitRepo->getDataApi());
                if($slug){
                    $data['recruit'] = new RecruitResource($this->recruitRepo->getDataBuSlug($slug));
                    $data['relates'] = RecruitResource::collection($this->recruitRepo->getDataByCategoryId($category['id'], $data['recruit']['id']));
                    unset($data['list_recruits']);
                }
                break;
            case 'introduces':
                if($category['slug'] == 'thu-ngo'){
                    $data['category'] =  new CategoryResource($category);
                }else{
                    $data['category'] =  new CategoryResource($category);
                    $data['introduces'] = IntroduceResource::collection($this->introduceRepo->getDataApi());
                }
                break;
            case 'project':
                $data['category'] =  new CategoryResource($category);
                if($category['slug'] == 'du-an'){
                    $data['list_categories'] =  CategoryResource::collection($this->categoryRepo->getCategoryByParentId($category['id']));
                    $data['projects'] = new ProjectCollection($this->projectRepo->getAllProjects());
                }else{
                    $data['list_categories'] =  CategoryResource::collection($this->categoryRepo->getCategoryByParentId($category['parent_id']));
                    $data['projects'] = new ProjectCollection($this->projectRepo->getAllProjectByCategoryId($category['id']));
                }
                if($slug){
                    unset($data['projects']);
                    unset($data['list_categories']);
                    $project = $this->projectRepo->getProjectBySlugAndCategoryId($slug, $category['id']);
                    $data['project'] = [];
                    if($project)
                        $data['project'] = new ProjectResource($this->projectRepo->getProjectBySlugAndCategoryId($slug, $category['id']));
                }
                break;
        }
        return response()->json([
            "success" => 200,
            "message" => "Success",
            "data" =>  $data
        ]);
    }
    public function indexLang($lang, $category, $slug = '')
    {
        dd($lang);
    }
    public function getDataHome(Request $request, $lang='vi')
    {
        try {
            $data = [
                'menu' => [],
                'project_header' => [],
                'project_tien_phong' => [],
                'project_tieu_bieu' => [],
                'list_project_tieu_bieus' => [],
                'activities' => [],
                'events' => [],
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

            $list_project_tieu_bieus = $this->projectRepo->getListProjectTieuBieus($lang);
            if(!empty($list_project_tieu_bieus))
                $data['list_project_tieu_bieus'] = ProjectResource::collection($list_project_tieu_bieus);

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
