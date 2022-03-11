<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Http\Requests\StoreManagersRequest;
use App\Http\Requests\UpdateManagersRequest;

class ManagerController extends Controller
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
     * @param  \App\Http\Requests\StoreManagersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $managers
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $managers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $managers
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $managers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManagersRequest  $request
     * @param  \App\Models\Manager  $managers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagersRequest $request, Manager $managers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $managers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $managers)
    {
        //
    }
}
