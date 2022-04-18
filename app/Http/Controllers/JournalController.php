<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Journal;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Models\System;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\JournalRepository as JournalRepo;
use App\Repositories\ImageRepository as ImageRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class JournalController extends Controller
{
    protected $view = 'journals';
    protected $journalRepo;
    protected $categoryRepo;
    protected $imageRepo;

    public function __construct(ImageRepo $imageRepo,JournalRepo $journalRepo,  CategoryRepo $categoryRepo)
    {
        $this->journalRepo = $journalRepo;
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo = $imageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(System $system)
    {
        $this->authorize('viewAny', $system);
        $journals = $this->journalRepo->getData();
        return view($this->view.'.index',[
            'journals' => $journals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Journal $journal)
    {
        $this->authorize('create', $journal);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('journal', $lang);
        $journal = new Journal();
        return view($this->view.'.create',[
            'journal'       => $journal,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJournalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJournalRequest $request)
    {
        $data = $request->only('name', 'category_id', 'avatar', 'lang', 'parent_lang');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['slug'] = Str::slug($request->name);
        $result = $this->journalRepo->create($data);
        $data = [];
        $data['slug'] = $result['slug'].'-'.$result['id'];
        $this->journalRepo->update($data, $result['id']);
        $list_pages = $request['list_pages'];
        foreach ($list_pages as $value):
            $data = [];
            $data['page'] = $value['page'] ? $value['page'] : 0;
            if($value['url']){
                $data['url'] = $value['url'];
                $data['journal_id'] = $result['id'];
                $this->imageRepo->create($data);
            }

        endforeach;
        return redirect(route('journals.index'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        $this->authorize('update', $journal);
        $lang = 'vi';
        $parent_lang = 0;
        $categories = $this->categoryRepo->getCategoryByType('journal', $lang);
        $image_pages = $this->imageRepo->getImagePageByJournalId($journal['id']);
        return view($this->view.'.update',[
            'journal'       => $journal,
            'view'          => $this->view,
            'lang'          => $lang,
            'parent_lang'   => $parent_lang,
            'categories'    => $categories,
            'image_pages'   => $image_pages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJournalRequest  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        $data = $request->only('name', 'category_id', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['slug'] = Str::slug($request->name).'-'.$journal['id'];
        $this->journalRepo->update($data, $journal['id']);
        $list_pages = $request['list_pages'];
        if($request['list_id_remove_pages']){
            $array_id_images = explode(',', $request['list_id_remove_pages']);
            Image::destroy($array_id_images);
        }
        if(isset($list_pages) && count($list_pages) > 0):
        foreach ($list_pages as $value):
            $data = [];
            $data['page'] = $value['page'] ? $value['page'] : 0;
            if($value['url']){
                $data['url'] = $value['url'];
                if(isset($value['id'])):
                    $this->imageRepo->update($data, $value['id']);
                else:
                    $data['journal_id'] = $journal['id'];
                    $this->imageRepo->create($data);
                endif;
            }
        endforeach;
        endif;
        return redirect(route('journals.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        $this->authorize('delete', $journal);
        $journal->delete();
        return redirect()->route('journals.index')->with('success','Xóa thành công');
    }
}
