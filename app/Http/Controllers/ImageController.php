<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImagesRequest;
use App\Http\Requests\UpdateImagesRequest;

class ImageController extends Controller
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
     * @param  \App\Http\Requests\StoreImagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Image $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImagesRequest  $request
     * @param  \App\Models\Image  $images
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImagesRequest $request, Image $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $images)
    {
        //
    }
}
