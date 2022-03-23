<?php

namespace App\Http\Controllers;

use App\Models\TypeProject;
use App\Http\Requests\StoreTypeProjectsRequest;
use App\Http\Requests\UpdateTypeProjectsRequest;
use App\Repositories\TypeProjectRepository as TypeProjectRepo;
use Illuminate\Support\Facades\Auth;

class TypeProjectController extends Controller
{
    protected $typeProjectRepo;

    public function __construct(TypeProjectRepo $typeProjectRepo)
    {
        $this->typeProjectRepo = $typeProjectRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TypeProject $typeProject)
    {
        $this->authorize('viewAny', $typeProject);
        $typeProjects = $this->typeProjectRepo->getData();
        return view('projects.type-projects.index',[
            'typeProjects' => $typeProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TypeProject $typeProject)
    {
        $this->authorize('create', $typeProject);
        $lang = 'vi';
        $parent_lang = 0;
        $typeProject = new TypeProject();
        return view('projects.type-projects.create', [
            'typeProject' => $typeProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    public function createLanguage(TypeProject $typeProject, $lang, $item_id)
    {
        $this->authorize('create', $typeProject);
        $check = $this->typeProjectRepo->checkLangExist($lang, $item_id);
        if($check)
            return abort(404);
        $parent_lang = $item_id;
        $typeProject = new TypeProject();
        return view('projects.type-projects.create', [
            'typeProject' => $typeProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeProjectsRequest $request)
    {
        $data = $request->only('name','lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        if($request->parent_lang)
            $data['parent_lang'] = $request->parent_lang;
        $this->typeProjectRepo->create($data);
        return redirect(route('type-projects.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeProject  $typeProject
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProject $typeProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeProject  $typeProject
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProject $typeProject)
    {
        $this->authorize('update', $typeProject);
        $lang = $typeProject['lang'];
        $parent_lang = $typeProject['parent_lang'];

        return view('projects.type-projects.update', [
            'typeProject' => $typeProject,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeProjectsRequest  $request
     * @param  \App\Models\TypeProject  $typeProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeProjectsRequest $request, TypeProject $typeProject)
    {
        $data = $request->only('name');
        $data['status'] = isset($request['status']) ? 1 : 0;

        $this->typeProjectRepo->update($data, $typeProject['id']);
        return redirect(route('type-projects.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeProject  $typeProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProject $typeProject)
    {
        $this->authorize('delete', $typeProject);
        $typeProject->delete();
        return redirect()->route('type-projects.index')->with('success','Xóa thành công');
    }
}
