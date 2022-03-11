<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Http\Requests\StoreRecruitsRequest;
use App\Http\Requests\UpdateRecruitsRequest;

class RecruitController extends Controller
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
