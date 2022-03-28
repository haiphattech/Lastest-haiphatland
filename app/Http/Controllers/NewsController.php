<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\EventRepository as eventRepo;
use App\Repositories\NewRepository as NewRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected $view = 'news';
    protected $newsRepo;
    protected $categoryRepo;

    public function __construct(NewRepo $newsRepo,  CategoryRepo $categoryRepo)
    {
        $this->newsRepo = $newsRepo;
        $this->categoryRepo = $categoryRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news)
    {
        $this->authorize('viewAny', $news);
        $list_news = $this->newsRepo->getData();
        return view($this->view.'.index',[
            'list_news' => $list_news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $news)
    {
        $this->authorize('create', $news);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('news', $lang);
        $news = new News();
        return view($this->view.'.create',[
            'news'          => $news,
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
    public function createLanguage(News $news, $lang, $item_id)
    {
        $this->authorize('create', $news);
        $parent_lang = $item_id;
        $categories = $this->categoryRepo->getCategoryByType('news', $lang);
        $news = new News();
        return view($this->view.'.create',[
            'news'          => $news,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'content', 'description', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['published'] = isset($request['status']) ? 1 : 0;
        $data['start'] = random_int(3,5);
        $data['view'] = random_int(3,20);
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->newsRepo->create($data);
        $data = [];
        $data['slug'] = $result['slug'].'-'.$result['id'];
        $this->newsRepo->update($data, $result['id']);
        return redirect(route('news.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->authorize('update', $news);
        $lang = $news['lang'];
        $parent_lang = $news['parent_lang'];
        $categories = $this->categoryRepo->getCategoryByType('news', $lang);
        return view($this->view.'.update', [
            'news' =>  $news,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view'      => $this->view,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'content', 'description');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name).'-'.$news['id'];
        $this->newsRepo->update($data, $news['id']);
        return redirect(route('news.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->authorize('delete', $news);
        $news->delete();
        return redirect()->route('news.index')->with('success','Xóa thành công');
    }
}
