<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\System;
use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\SystemRepository as SystemRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SystemController extends Controller
{
    protected $view = 'systems';
    protected $systemRepo;
    protected $categoryRepo;

    public function __construct(SystemRepo $systemRepo,  CategoryRepo $categoryRepo)
    {
        $this->systemRepo = $systemRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(System $system)
    {
        $this->authorize('viewAny', $system);
        $systems = $this->systemRepo->getData();
        return view($this->view.'.index',[
            'systems' => $systems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(System $system)
    {
//        $this->authorize('create', $system);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('system', $lang);
        $system = new System();
        return view($this->view.'.create',[
            'system'        => $system,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemRequest $request)
    {
        $data = $request->only('name', 'category_id', 'address', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $this->systemRepo->create($data);
        return redirect(route('systems.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemRequest  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemRequest $request, System $system)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
