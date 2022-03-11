<?php

namespace App\Http\Controllers;

use App\Models\TypeProject;
use App\Http\Requests\StoreTypeProjectsRequest;
use App\Http\Requests\UpdateTypeProjectsRequest;

class TypeProjectController extends Controller
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
     * @param  \App\Http\Requests\StoreTypeProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeProjectsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProject $typeProjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProject $typeProjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeProjectsRequest  $request
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeProjectsRequest $request, TypeProject $typeProjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProject $typeProjects)
    {
        //
    }
}
