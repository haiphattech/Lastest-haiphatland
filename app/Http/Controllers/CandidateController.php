<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidatesRequest;
use App\Http\Requests\UpdateCandidatesRequest;
use App\Repositories\CandidateRepository as CandidateRepo;

class CandidateController extends Controller
{
    protected $view = 'candidates';
    protected $candidateRepo;
    public function __construct(CandidateRepo $candidateRepo)
    {
        $this->candidateRepo = $candidateRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Candidate $candidate)
    {
        $this->authorize('viewAny', $candidate);
        $candidates = $this->candidateRepo->getData();
        return view($this->view.'.index',[
            'candidates' => $candidates
        ]);
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
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $this->authorize('view', $candidate);
        if(!$candidate) abort(404);
        return view($this->view.'.show', [
            'candidate' =>  $candidate,
            'view'      => $this->view,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $this->authorize('update', $candidate);
        if(!$candidate) abort(404);
        return view($this->view.'.update', [
            'candidate' =>  $candidate,
            'view'      => $this->view,
        ]);
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
