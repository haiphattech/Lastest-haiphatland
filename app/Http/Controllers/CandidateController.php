<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidatesRequest;
use App\Http\Requests\UpdateCandidatesRequest;

class CandidateController extends Controller
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
     * @param  \App\Http\Requests\StoreCandidatesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidatesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidates
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidates
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidatesRequest  $request
     * @param  \App\Models\Candidate  $candidates
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidatesRequest $request, Candidate $candidates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidates)
    {
        //
    }
}
