<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Repositories\InvestorRepository as InvestorRepo;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\StatusProjectRepository as StatusProjectRepo;
use App\Repositories\ManagerRepository as ManagerRepo;
use App\Repositories\NewsRepository as NewsRepo;
use App\Repositories\ProjectNewsRepository as ProjectNewsRepo;
use App\Repositories\ProjectDetailRepository as ProjectDetailRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    protected $view = 'projects';
    protected $investorRepo;
    protected $projectRepo;
    protected $categoryRepo;
    protected $managerRepo;
    protected $newsRepo;
    protected $projectNewsRepo;
    protected $projectDetailRepo;
    protected $statusProjectRepo;

    public function __construct(ProjectDetailRepo $projectDetailRepo, ProjectNewsRepo $projectNewsRepo, NewsRepo $newsRepo, ManagerRepo $managerRepo, StatusProjectRepo $statusProjectRepo, InvestorRepo $investorRepo, ProjectRepo $projectRepo, CategoryRepo $categoryRepo)
    {
        $this->projectRepo  = $projectRepo;
        $this->investorRepo = $investorRepo;
        $this->categoryRepo = $categoryRepo;
        $this->managerRepo  = $managerRepo;
        $this->newsRepo     = $newsRepo;
        $this->projectNewsRepo   = $projectNewsRepo;
        $this->statusProjectRepo = $statusProjectRepo;
        $this->projectDetailRepo = $projectDetailRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $this->authorize('viewAny', $project);
        $projects = $this->projectRepo->getData();

        return view($this->view.'.index',[
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $this->authorize('create', $project);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('project', $lang);
        $investors = $this->investorRepo->getInvestorProjects($lang);
        $news = $this->newsRepo->getNewsProjects($lang);
        $managers  = $this->managerRepo->getManagerProjects($lang);
        $statusProjects = $this->statusProjectRepo->getByStatus($lang);
        $project = new Project();
        return view($this->view.'.create',[
            'investors' => $investors,
            'news'      => $news,
            'managers'  => $managers,
            'project'   => $project,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories,
            'statusProjects' => $statusProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Project $project, $lang, $item_id)
    {
        $this->authorize('create', $project);
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('project', $lang);
        $investors = $this->investorRepo->getInvestorProjects($lang);
        $news = $this->newsRepo->getNewsProjects($lang);
        $managers  = $this->managerRepo->getManagerProjects($lang);
        $statusProjects = $this->statusProjectRepo->getByStatus($lang);
        $project = new Project();
        return view($this->view.'.create',[
            'news'      => $news,
            'managers'  => $managers,
            'investors' => $investors,
            'project'   => $project,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories,
            'statusProjects' => $statusProjects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectsRequest $request)
    {
        $data = $request->only('name', 'category_id', 'status_project_id', 'avatar', 'cover', 'lang', 'description', 'parent_lang', 'phone', 'email', 'address', 'province','quy_mo', 'investor_id', 'design', 'sales_policy', 'list_video');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['tien_phong'] = isset($request['tien_phong']) ? 1 : 0;
        $data['tieu_bieu'] = isset($request['tieu_bieu']) ? 1 : 0;
        $data['display_home'] = isset($request['display_home']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->projectRepo->create($data);
        $result->news()->attach($request['list_news']);
        $data = [];
        $data['slug'] = Str::slug($request->name).'-'.$result['id'];
        $this->projectRepo->update($data, $result['id']);
        $news_projects = $request['news_projects'];
        foreach ($news_projects as $item):
            $data = [];
            if($item['title'] && $item['icon'] && $item['content']):
                $data['title']      = $item['title'];
                $data['icon']       = $item['icon'];
                $data['content']    = $item['content'];
                $data['project_id'] = $result['id'];
                $data['created_by'] = Auth::id();
                $this->projectDetailRepo->create($data);
            endif;
        endforeach;
        return redirect(route('projects.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('create', $project);
        $lang = $project['lang'];
        $parent_lang = $project['parent_lang'];
        $investors = $this->investorRepo->getInvestorProjects($lang);
        $categories = $this->categoryRepo->getCategoryByType('project', $lang);
        $statusProjects = $this->statusProjectRepo->getByStatus($lang);
        $news = $this->newsRepo->getNewsProjects($lang);
        $managers  = $this->managerRepo->getManagerProjects($lang);
        $list_news = $this->projectNewsRepo->getData($project['id']);
        $news_projects = $this->projectDetailRepo->getProjectDetailByProjectId($project['id']);

        return view($this->view.'.update',[
            'news'      => $news,
            'managers'  => $managers,
            'investors' => $investors,
            'project'   => $project,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories,
            'statusProjects' => $statusProjects,
            'list_news' => $list_news,
            'news_projects' => $news_projects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectsRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Project $project)
    {
        $data = $request->only('name', 'category_id', 'status_project_id', 'avatar', 'cover', 'lang', 'parent_lang', 'description', 'phone', 'email', 'address', 'province','quy_mo', 'investor_id', 'design', 'sales_policy', 'list_video');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['tien_phong'] = isset($request['tien_phong']) ? 1 : 0;
        $data['tieu_bieu'] = isset($request['tieu_bieu']) ? 1 : 0;
        $data['display_home'] = isset($request['display_home']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name).'-'.$project['id'];
        $this->projectRepo->update($data, $project['id']);
        $news_projects = $request['news_projects'];
        $checkProjectNews = $this->projectNewsRepo->checkExistNewsByProjectId($project['id']);
        if(count($checkProjectNews) > 0){
            $project->news()->sync($request['list_news']);
        }else{
            $project->news()->attach($request['list_news']);
        }
        foreach ($news_projects as $item):
            $data = [];
            $data['title']      = $item['title'];
            $data['icon']       = $item['icon'];
            $data['content']    = $item['content'];
            if(isset($item['id']) && $item['id'] > 0){
                $this->projectDetailRepo->update($data, $item['id']);
            }else{
                $data['project_id'] = $project['id'];
                $data['created_by'] = Auth::id();
                $this->projectDetailRepo->create($data);
            }
        endforeach;
        return redirect(route('projects.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projects)
    {
        //
    }
}
