<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Http\Requests\StoreInvestorRequest;
use App\Http\Requests\UpdateInvestorRequest;
use App\Repositories\InvestorRepository as InvestorRepo;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    protected $investorRepo;
    protected $view = 'projects.investors';

    public function __construct(InvestorRepo $investorRepo)
    {
        $this->investorRepo = $investorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Investor $investor)
    {
        $this->authorize('viewAny', $investor);
        $investors = $this->investorRepo->getData();

        return view($this->view.'.index',[
            'investors' => $investors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Investor $investor)
    {
        $this->authorize('create', $investor);
        $lang = 'vi';
        $parent_lang = 0;
        $investor = new Investor();
        return view($this->view.'.create', [
            'investor' => $investor,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view' => $this->view,
        ]);
    }

    public function createLanguage (Investor $investor, $lang, $item_id)
    {
        $this->authorize('create', $investor);
        $check = $this->investorRepo->checkLangExist($lang, $item_id);
        if($check)
            return abort(404);
        $parent_lang = $item_id;
        $investor = new Investor();
        return view($this->view.'.create', [
            'investor' => $investor,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view' => $this->view,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvestorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestorRequest $request)
    {
        $data = $request->only('name_company', 'phone', 'address', 'fax', 'email', 'lang', 'parent_lang', 'description', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $this->investorRepo->create($data);
        if($request->submit == 'save&exit'){
            return redirect(route('investors.index'))->with('success',  'Thêm thành công');
        }
        return redirect(route('investors.create'))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor)
    {
        $this->authorize('update', $investor);
        if(!$investor)
            return abort(404);
        $lang = $investor['lang'];
        $parent_lang = $investor['parent_lang'];
        return view($this->view.'.update', [
            'investor' => $investor,
            'lang'     => $lang,
            'parent_lang' => $parent_lang,
            'view' => $this->view,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvestorRequest  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestorRequest $request, Investor $investor)
    {
        $data = $request->only('name_company', 'phone', 'address', 'fax', 'email', 'description', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->investorRepo->update($data, $investor['id']);
        if($request->submit == 'save&exit'){
            return redirect(route('investors.index'))->with('success',  'cập nhật thành công');
        }
        return redirect()->back()->with('success',  'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investor $investor)
    {
        $this->authorize('delete', $investor);
        $investor->delete();
        return redirect()->route('investors.index')->with('success','Xóa thành công');
    }
}
