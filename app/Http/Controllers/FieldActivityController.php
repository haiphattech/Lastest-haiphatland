<?php

namespace App\Http\Controllers;

use App\Models\FieldActivities;
use App\Http\Requests\StoreFieldActivitiesRequest;
use App\Http\Requests\UpdateFieldActivitiesRequest;

class FieldActivityController extends Controller
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
     * @param  \App\Http\Requests\StoreFieldActivitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldActivitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldActivities  $fieldActivities
     * @return \Illuminate\Http\Response
     */
    public function show(FieldActivities $fieldActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldActivities  $fieldActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldActivities $fieldActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldActivitiesRequest  $request
     * @param  \App\Models\FieldActivities  $fieldActivities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldActivitiesRequest $request, FieldActivities $fieldActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldActivities  $fieldActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldActivities $fieldActivities)
    {
        //
    }
}
