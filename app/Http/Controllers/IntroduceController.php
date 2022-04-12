<?php

namespace App\Http\Controllers;

use App\Models\Introduce;
use App\Http\Requests\StoreIntroduceRequest;
use App\Http\Requests\UpdateIntroduceRequest;
use App\Repositories\IntroduceRepository as IntroduceRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Auth;

class IntroduceController extends Controller
{
    protected $view = 'introduces';
    protected $introduceRepo;
    protected $categoryRepo;

    public function __construct(IntroduceRepo $introduceRepo,  CategoryRepo $categoryRepo)
    {
        $this->introduceRepo = $introduceRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Introduce $introduce)
    {
        $this->authorize('viewAny', $introduce);
        $introduces = $this->introduceRepo->getData();
        return view($this->view.'.index',[
            'introduces' => $introduces
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Introduce $introduce)
    {
        $this->authorize('create', $introduce);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('introduces', $lang);
        $introduce = new Introduce();
        return view($this->view.'.create',[
            'introduce'      => $introduce,
            'view'           => $this->view,
            'lang'           => $lang,
            'parent_lang'    => $parent_lang,
            'categories'     => $categories,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Introduce $introduce, $lang, $item_id)
    {
        $this->authorize('create', $introduce);
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('introduces', $lang);
        $introduce = new Introduce();
        return view($this->view.'.create',[
            'introduce'      => $introduce,
            'view'           => $this->view,
            'lang'           => $lang,
            'parent_lang'    => $parent_lang,
            'categories'     => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIntroduceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIntroduceRequest $request)
    {
        $data = $request->only('title_font', 'title', 'serial', 'category_id', 'description', 'parent_lang', 'lang', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $this->introduceRepo->create($data);
        return redirect(route('introduces.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function show(Introduce $introduce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduce $introduce)
    {
        $this->authorize('update', $introduce);
        $lang = $introduce['lang'];
        $parent_lang = $introduce['parent_lang'];
        $categories = $this->categoryRepo->getCategoryByType('introduces', $lang);
        return view($this->view.'.update', [
            'introduce' =>  $introduce,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view'      => $this->view,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIntroduceRequest  $request
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIntroduceRequest $request, Introduce $introduce)
    {
        $data = $request->only('title_font', 'title', 'serial', 'category_id', 'description', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->introduceRepo->update($data, $introduce['id']);
        return redirect(route('introduces.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduce $introduce)
    {
        $this->authorize('delete', $introduce);
        $introduce->delete();
        return redirect()->route('introduces.index')->with('success','Xóa thành công');
    }
}
