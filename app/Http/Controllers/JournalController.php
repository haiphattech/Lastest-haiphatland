<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Http\Requests\StoreJournalsRequest;
use App\Http\Requests\UpdateJournalsRequest;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJournalsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJournalsRequest $request)
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
     * @param  \App\Http\Requests\UpdateJournalsRequest  $request
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalsRequest $request, Journal $journals)
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
