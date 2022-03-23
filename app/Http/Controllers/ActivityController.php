<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Repositories\ActivityRepository as ActivityRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    protected $view = 'activities';
    protected $activityRepo;
    protected $categoryRepo;

    public function __construct(ActivityRepo $activityRepo, CategoryRepo $categoryRepo)
    {
        $this->activityRepo = $activityRepo;
        $this->categoryRepo = $categoryRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        $this->authorize('viewAny', $activity);
        $activities = $this->activityRepo->getData();
        return view($this->view.'.index',[
                'activities' => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity)
    {
        $this->authorize('create', $activity);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('activities', $lang);
        $activity = new Activity();
        return view($this->view.'.create',[
            'activity'   => $activity,
            'view'      => $this->view,
            'lang'      => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Activity $activity, $lang, $item_id)
    {
        $this->authorize('create', $activity);
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('activities', $lang);
        $activity = new Activity();
        return view($this->view.'.create',[
            'activity'      => $activity,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'description', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['display_home'] = isset($request['display_home']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->activityRepo->create($data);
        $data = [];
        $data['slug'] = Str::slug($request->name).'-'.$result['id'];
        $this->activityRepo->update($data, $result['id']);
        return redirect(route('activities.index'))->with('success',  'Thêm thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $this->authorize('update', $activity);
        $lang = $activity['lang'];
        $parent_lang = $activity['parent_lang'];
        $categories = $this->categoryRepo->getCategoryByType('activities', $lang);
        return view($this->view.'.update', [
            'activity' => $activity,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view'      => $this->view,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityRequest  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'description');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['display_home'] = isset($request['display_home']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name).'-'.$activity['id'];
        $this->activityRepo->update($data, $activity['id']);
        return redirect(route('activities.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $this->authorize('delete', $activity);
        $activity->delete();
        return redirect()->route('activities.index')->with('success','Xóa thành công');
    }
}
