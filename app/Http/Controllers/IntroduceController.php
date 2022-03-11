<?php

namespace App\Http\Controllers;

use App\Models\Introduce;
use App\Http\Requests\StoreIntroduceRequest;
use App\Http\Requests\UpdateIntroduceRequest;

class IntroduceController extends Controller
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
     * @param  \App\Http\Requests\StoreIntroduceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIntroduceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function show(Introduce $introduce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduce $introduce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIntroduceRequest  $request
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIntroduceRequest $request, Introduce $introduce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduce $introduce)
    {
        //
    }
}
