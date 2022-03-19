<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Repositories\InvestorRepository as InvestorRepo;
use App\Repositories\ProjectRepository as ProjectRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\StatusProjectRepository as StatusProjectRepo;


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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectsRequest $request)
    {
        //
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
