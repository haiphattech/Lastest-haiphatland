<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Http\Requests\StoreAbout_usRequest;
use App\Http\Requests\UpdateAbout_usRequest;

class AboutUsController extends Controller
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
     * @param  \App\Http\Requests\StoreAbout_usRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbout_usRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function show(About_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit(About_us $about_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbout_usRequest  $request
     * @param  \App\Models\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbout_usRequest $request, About_us $about_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_us $about_us)
    {
        //
    }
}
