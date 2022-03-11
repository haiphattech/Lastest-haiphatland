<?php

namespace App\Http\Controllers;

use App\Models\StatusProject;
use App\Http\Requests\StoreStatusProjectsRequest;
use App\Http\Requests\UpdateStatusProjectsRequest;

class StatusProjectController extends Controller
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
     * @param  \App\Http\Requests\StoreStatusProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusProjectsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusProject  $statusProjects
     * @return \Illuminate\Http\Response
     */
    public function show(StatusProject $statusProjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusProject  $statusProjects
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusProject $statusProjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusProjectsRequest  $request
     * @param  \App\Models\StatusProject  $statusProjects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusProjectsRequest $request, StatusProject $statusProjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusProject  $statusProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusProject $statusProjects)
    {
        //
    }
}
