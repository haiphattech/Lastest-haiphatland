<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Models\System;
use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\JournalRepository as JournalRepo;


class JournalController extends Controller
{
    protected $view = 'journals';
    protected $journalRepo;
    protected $categoryRepo;

    public function __construct(JournalRepo $journalRepo,  CategoryRepo $categoryRepo)
    {
        $this->journalRepo = $journalRepo;
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
        //
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
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJournalRequest  $request
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalRequest $request, Journal $journals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journals)
    {
        //
    }
}
