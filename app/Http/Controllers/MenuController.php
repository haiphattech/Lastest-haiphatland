<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Repositories\MenuRepository as MenuRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    protected $menuRepo;
    protected $categoryRepo;

    public function __construct(MenuRepo $menuRepo, CategoryRepo $categoryRepo)
    {
        $this->menuRepo = $menuRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu)
    {
        $this->authorize('viewAny', $menu);
        $menus = $this->menuRepo->getMenus();

        return view('menus.index',[
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu)
    {
        $this->authorize('create', $menu);
        $lang = 'vi';
        $parent_lang = 0;
        $menu = new Menu();
        $categories = $this->categoryRepo->getAllCategories('vi');
        return view('menus.create', [
            'menu' => $menu,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLanguage(Menu $menu, $lang, $menu_id)
    {
        $this->authorize('create', $menu);
        $check = $this->menuRepo->checkLangExist($lang, $menu_id);
        if($check)
            return abort(404);
        $parent_lang = $menu_id;
        $menu = new Menu();
        $categories = $this->categoryRepo->getAllCategories($lang);
        return view('menus.create', [
            'menu' => $menu,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $data = $request->only('name', 'key', 'lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $array_menus = [];
        foreach (json_decode($request['data']) as $dat){
            $array_menus[] = json_decode(json_encode($dat),true);
        }
        $data['data'] = serialize($array_menus);
        if($request->parent_lang)
            $data['parent_lang'] = $request->parent_lang;
        $this->menuRepo->create($data);
        return redirect(route('menus.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $this->authorize('update', $menu);
        $lang = 'vi';
        $parent_lang = 0;
        if($menu['data']){
            $categories = unserialize($menu['data']);
        }else{
            $categories = $this->categoryRepo->getAllCategories('vi');
        }
        return view('menus.update', [
            'menu' => $menu,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->only('name', 'key', 'parent_lang', 'lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $array_menus = [];
        foreach (json_decode($request['data']) as $dat){
            $array_menus[] = json_decode(json_encode($dat),true);
        }
        $data['data'] = serialize($array_menus);
        $this->menuRepo->update($data, $menu['id']);
        return redirect(route('menus.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $this->authorize('delete', $menu);
        $menu->delete();
        return redirect()->route('menus.index')->with('success','Xóa thành công');
    }
}
