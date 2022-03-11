<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use App\Http\Requests\StoreProjectDetailRequest;
use App\Http\Requests\UpdateProjectDetailRequest;

class ProjectDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectDetailRequest  $request
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectDetailRequest $request, ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDetail $projectDetail)
    {
        //
    }
}
