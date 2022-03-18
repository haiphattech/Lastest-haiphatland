<?php

namespace App\Http\Controllers;

use App\Models\statusProject;
use App\Http\Requests\StorestatusProjectRequest;
use App\Http\Requests\UpdatestatusProjectRequest;
use App\Repositories\StatusProjectRepository as StatusProjectRepo;
use Illuminate\Support\Facades\Auth;

class StatusProjectController extends Controller
{
    protected $statusProjectRepo;

    public function __construct(StatusProjectRepo $statusProjectRepo)
    {
        $this->statusProjectRepo = $statusProjectRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatusProject $statusProject)
    {
        $this->authorize('viewAny', $statusProject);
        $statusProjects = $this->statusProjectRepo->getData();
        return view('projects.status-projects.index',[
            'statusProjects' => $statusProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StatusProject $statusProject)
    {
        $this->authorize('create', $statusProject);
        $lang = 'vi';
        $parent_lang = 0;
        $statusProject = new StatusProject();
        return view('projects.status-projects.create', [
            'statusProject' => $statusProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    public function createLanguage(StatusProject $statusProject, $lang, $item_id)
    {
        $this->authorize('create', $statusProject);
        $check = $this->statusProjectRepo->checkLangExist($lang, $item_id);
        if($check)
            return abort(404);
        $parent_lang = $item_id;
        $statusProject = new statusProject();
        return view('projects.status-projects.create', [
            'statusProject' => $statusProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestatusProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestatusProjectRequest $request)
    {
        $data = $request->only('name','lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        if($request->parent_lang)
            $data['parent_lang'] = $request->parent_lang;
        $this->statusProjectRepo->create($data);
        return redirect(route('status-projects.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Http\Response
     */
    public function show(statusProject $statusProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Http\Response
     */
    public function edit(statusProject $statusProject)
    {
        $this->authorize('update', $statusProject);
        $lang = $statusProject['lang'];
        $parent_lang = $statusProject['parent_lang'];

        return view('projects.status-projects.update', [
            'statusProject' => $statusProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestatusProjectRequest  $request
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestatusProjectRequest $request, statusProject $statusProject)
    {
        $data = $request->only('name');
        $data['status'] = isset($request['status']) ? 1 : 0;

        $this->statusProjectRepo->update($data, $statusProject['id']);
        return redirect(route('status-projects.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(statusProject $statusProject)
    {
        $this->authorize('delete', $statusProject);
        $statusProject->delete();
        return redirect()->route('status-projects.index')->with('success','Xóa thành công');
    }
}
