<?php

namespace App\Http\Controllers;

use App\Models\Introduce;
use App\Models\IntroduceDetail;
use App\Http\Requests\StoreIntroduceDetailRequest;
use App\Http\Requests\UpdateIntroduceDetailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Repositories\IntroduceDetailRepository as IntroduceDetailRepo;
use App\Repositories\IntroduceRepository as IntroduceRepo;

class IntroduceDetailController extends Controller
{
    protected $view = 'introduce-details';
    protected $introduceDetailRepo;
    protected $introduceRepo;

    public function __construct(IntroduceRepo $introduceRepo, IntroduceDetailRepo $introduceDetailRepo)
    {
        $this->introduceDetailRepo = $introduceDetailRepo;
        $this->introduceRepo = $introduceRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $introduce)
    {
        $introduceDetails = $this->introduceDetailRepo->getData($introduce);
        return view($this->view.'.index',[
            'introduceDetails' => $introduceDetails,
            'introduce' => $introduce
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Introduce  $introduce)
    {
        if(!$introduce) return abort(404);
        $lang = $introduce['lang'];
        $parent_lang = $introduce['parent_lang'];
        $introduceDetail = new IntroduceDetail();
        return view($this->view.'.create',[
            'introduce'      => $introduce,
            'introduceDetail'=> $introduceDetail,
            'view'           => $this->view,
            'lang'           => $lang,
            'parent_lang'    => $parent_lang,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIntroduceDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIntroduceDetailRequest $request, $introduce)
    {
        $data = $request->only('title', 'description', 'parent_lang', 'lang', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['created_by'] = Auth::id();
        $data['introduce_id'] = $introduce;
        $this->introduceDetailRepo->create($data);
        return redirect(route('introduce_detail_list', $introduce))->with('success',  'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntroduceDetail  $introduceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(IntroduceDetail $introduceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IntroduceDetail  $introduceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduce  $introduce, IntroduceDetail $introduceDetail)
    {
        if(!$introduce) return abort(404);
        $lang = $introduceDetail['lang'];
        $parent_lang = $introduceDetail['parent_lang'];
        return view($this->view.'.update',[
            'introduce'      => $introduce,
            'introduceDetail'=> $introduceDetail,
            'view'           => $this->view,
            'lang'           => $lang,
            'parent_lang'    => $parent_lang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIntroduceDetailRequest  $request
     * @param  \App\Models\IntroduceDetail  $introduceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIntroduceDetailRequest $request,Introduce  $introduce, IntroduceDetail $introduceDetail)
    {
        $data = $request->only('title', 'description', 'avatar');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->introduceDetailRepo->update($data, $introduceDetail['id']);
        return redirect(route('introduce_detail_list', $introduce['id']))->with('success',  'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntroduceDetail  $introduceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduce  $introduce, IntroduceDetail $introduceDetail)
    {
        $introduceDetail->delete();
        return redirect()->route('introduce_detail_list', $introduce['id'])->with('success','Xóa thành công');
    }
}
