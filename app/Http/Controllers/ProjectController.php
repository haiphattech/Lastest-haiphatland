<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Repositories\InvestorRepository as InvestorRepo;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\StatusProjectRepository as StatusProjectRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    protected $view = 'projects';
    protected $investorRepo;
    protected $projectRepo;
    protected $categoryRepo;
    protected $statusProjectRepo;

    public function __construct(StatusProjectRepo $statusProjectRepo, InvestorRepo $investorRepo, ProjectRepo $projectRepo, CategoryRepo $categoryRepo)
    {
        $this->projectRepo = $projectRepo;
        $this->investorRepo = $investorRepo;
        $this->categoryRepo = $categoryRepo;
        $this->statusProjectRepo = $statusProjectRepo;
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
        $investors = $this->projectRepo->getByStatus();
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('project', $lang);
        $statusProjects = $this->statusProjectRepo->getByStatus($lang);
        $project = new Project();
        return view($this->view.'.create',[
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Project $project, $lang, $item_id)
    {
        $this->authorize('create', $project);
        $investors = $this->projectRepo->getByStatus();
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('project', $lang);
        $statusProjects = $this->statusProjectRepo->getByStatus($lang);
        $project = new Project();
        return view($this->view.'.create',[
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
        $data = $request->only('name', 'category_id', 'status_project_id', 'avatar', 'cover', 'description', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['tien_phong'] = isset($request['tien_phong']) ? 1 : 0;
        $data['tieu_bieu'] = isset($request['tieu_bieu']) ? 1 : 0;
        $data['display_home'] = isset($request['display_home']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->projectRepo->create($data);
        $data = [];
        $data['slug'] = Str::slug($request->name).'-'.$result['id'];
        $this->projectRepo->update($data, $result['id']);
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
    public function edit(Project $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectsRequest  $request
     * @param  \App\Models\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, Project $projects)
    {
        //
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
