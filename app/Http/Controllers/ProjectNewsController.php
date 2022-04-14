<?php

namespace App\Http\Controllers;

use App\Models\ProjectNews;
use App\Http\Requests\StoreProjectNewsRequest;
use App\Http\Requests\UpdateProjectNewsRequest;

class ProjectNewsController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectNewsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectNews  $projectNews
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectNews $projectNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectNews  $projectNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectNews $projectNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectNewsRequest  $request
     * @param  \App\Models\ProjectNews  $projectNews
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectNewsRequest $request, ProjectNews $projectNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectNews  $projectNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectNews $projectNews)
    {
        //
    }
}
