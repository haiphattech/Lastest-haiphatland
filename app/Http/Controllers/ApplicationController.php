<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Repositories\ApplicationRepository as ApplicationRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    protected $view = 'applications';
    protected $applicationRepo;
    protected $categoryRepo;

    public function __construct(ApplicationRepo $applicationRepo, CategoryRepo $categoryRepo)
    {
        $this->applicationRepo = $applicationRepo;
        $this->categoryRepo = $categoryRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application)
    {
        $this->authorize('viewAny', $application);
        $applications = $this->applicationRepo->getData();
        return view($this->view.'.index',[
            'applications' => $applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Application $application)
    {
        $this->authorize('create', $application);
        $lang = 'vi';
        $parent_lang = 0;
        $application = new Application();
        return view($this->view.'.create',[
            'application'   => $application,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Application $application, $lang, $item_id)
    {
        $this->authorize('create', $application);
        $parent_lang = $item_id;
        $application = new Application();
        return view($this->view.'.create',[
            'application'      => $application,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        $data = $request->only('name', 'url', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $result = $this->applicationRepo->create($data);
        return redirect(route('applications.index'))->with('success',  'Thêm thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('update', $application);
        $lang = $application['lang'];
        $parent_lang = $application['parent_lang'];
        return view($this->view.'.update', [
            'application' => $application,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view'      => $this->view,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $data = $request->only('name', 'url');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->applicationRepo->update($data, $application['id']);
        return redirect(route('applications.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();
        return redirect()->route('applications.index')->with('success','Xóa thành công');
    }
}
