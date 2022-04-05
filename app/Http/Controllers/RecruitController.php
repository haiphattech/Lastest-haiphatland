<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\StoreRecruitsRequest;
use App\Http\Requests\UpdateRecruitsRequest;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\EventRepository as eventRepo;
use App\Repositories\RecruitRepository as RecruitRepo;

class RecruitController extends Controller
{
    protected $view = 'recruits';
    protected $recruitRepo;
    protected $categoryRepo;

    public function __construct(EventRepo $eventRepo, CategoryRepo $categoryRepo,RecruitRepo $recruitRepo)
    {
        $this->eventRepo = $eventRepo;
        $this->categoryRepo = $categoryRepo;
        $this->recruitRepo = $recruitRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recruit $recruit)
    {
        $this->authorize('viewAny', $recruit);
        $recruits = $this->recruitRepo->getData();
        return view($this->view.'.index',[
            'recruits' => $recruits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Recruit $recruit)
    {
        $this->authorize('create', $recruit);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('recruit', $lang);
        $recruit = new Recruit();
        return view($this->view.'.create',[
            'recruit'      => $recruit,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecruitsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecruitsRequest  $request
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecruitsRequest $request, Recruit $recruits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruits)
    {
        //
    }
}
