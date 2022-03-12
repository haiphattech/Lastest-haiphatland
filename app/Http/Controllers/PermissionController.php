<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TypePermissionRepository as TypePermissionRepo;
use App\Repositories\PermissionRepository as PermissionRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    protected $typePermissionRepoRepo;
    protected $permissionRepoRepo;

    public function __construct(TypePermissionRepo $typePermissionRepoRepo, PermissionRepo $permissionRepoRepo)
    {
        $this->permissionRepoRepo = $permissionRepoRepo;
        $this->typePermissionRepoRepo = $typePermissionRepoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $permissions = $this->permissionRepoRepo->getPermissions();

        return view('permissions.index',[
            'permissions'  => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $typePermissions = $this->typePermissionRepoRepo->getTypePermissionByStatus(true);

        return view('permissions.create',[
            'typePermissions' => $typePermissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:permissions',
            'title' => 'required|max:255|unique:permissions',
            'type_permission_id' => 'required',
        ]);

        $data = $request->only('name', 'title', 'type_permission_id');
        $data['status'] = isset($request['status']) ? 1 : 0;
        $data['staff_id'] = Auth::id();

        $this->permissionRepoRepo->create($data);
        return redirect(route('permissions.index'))->with('success',  'Thêm quyền thành công');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
