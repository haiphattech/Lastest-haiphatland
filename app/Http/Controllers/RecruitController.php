<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\StoreRecruitRequest;
use App\Http\Requests\UpdateRecruitRequest;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\EventRepository as eventRepo;
use App\Repositories\RecruitRepository as RecruitRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Recruit $recruit, $lang, $item_id)
    {
        $this->authorize('create', $recruit);
        $parent_lang = $item_id;
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
     * @param  \App\Http\Requests\StoreRecruitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitRequest $request)
    {
        $data = $request->only('name', 'category_id', 'location', 'lang', 'parent_lang', 'content', 'date_end');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->recruitRepo->create($data);
        $data = [];
        $data['slug'] = $result['slug'].'-'.$result['id'];
        $this->recruitRepo->update($data, $result['id']);
        return redirect(route('recruits.index'))->with('success',  'Thêm thành công');
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
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruit $recruit)
    {
        $this->authorize('update', $recruit);
        $lang = $recruit['lang'];
        $parent_lang = $recruit['parent_lang'];
        $categories = $this->categoryRepo->getCategoryByType('recruit', $lang);
        return view($this->view.'.update', [
            'recruit'       => $recruit,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'view'          => $this->view,
            'categories'    => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecruitRequest $request
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecruitRequest $request, Recruit $recruit)
    {
        $data = $request->only('name', 'category_id', 'location', 'content', 'date_end');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name).'-'.$recruit['id'];
        $this->recruitRepo->update($data, $recruit['id']);
        return redirect(route('recruits.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruit  $recruit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruit $recruit)
    {
        $this->authorize('delete', $recruit);
        $recruit->delete();
        return redirect()->route('recruits.index')->with('success','Xóa thành công');
    }
}
