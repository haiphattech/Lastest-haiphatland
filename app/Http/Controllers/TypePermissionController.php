<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypePermission;
use App\Repositories\TypePermissionRepository as TypePermissionRepo;
use Illuminate\Http\Request;

class TypePermissionController extends Controller
{
    protected $typePermissionRepoRepo;

    public function __construct(TypePermissionRepo $typePermissionRepoRepo)
    {
        $this->typePermissionRepoRepo = $typePermissionRepoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $typePermissions = $this->typePermissionRepoRepo->getTypePermissions();

        return view('type-permissions.index',[
            'typePermissions' => $typePermissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typePermission = new TypePermission();
        return view('type-permissions.create',[
            'typePermission' => $typePermission
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data['name'] = $request['name'];
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->typePermissionRepoRepo->create($data);

        return redirect(route('type-permissions.index'))->with('success',  'Thêm loại quyền thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typePermission = $this->typePermissionRepoRepo->find($id);
        if(!$typePermission) return abort(404);
        return view('type-permissions.update',[
            'typePermission' => $typePermission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data['name'] = $request['name'];
        $data['status'] = isset($request['status']) ? 1 : 0;
        $this->typePermissionRepoRepo->update($data, $id);

        return redirect(route('type-permissions.index'))->with('success',  'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypePermission::destroy($id);
        return redirect()->route('type-permissions.index')->with('success','Xóa thành công');
    }
}
