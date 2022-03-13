<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Repositories\PermissionRepository as PermissionRepo;
use App\Repositories\RoleUserRepository as RoleUserRepo;
use App\Repositories\UserRepository as UserRepository;
use App\Repositories\RoleRepository as RoleRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $roleRepo;
    protected $userRepo;
    protected $roleUserRepo;
    protected $permissionRepoRepo;

    public function __construct(RoleUserRepo $roleUserRepo,UserRepository $userRepo, PermissionRepo $permissionRepoRepo, RoleRepo $roleRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->userRepo = $userRepo;
        $this->roleUserRepo = $roleUserRepo;
        $this->permissionRepoRepo = $permissionRepoRepo;
    }

    public function authorization($user_id)
    {
        $user = $this->userRepo->find($user_id);
        if(!$user)
            return view('back-end.errors.404');
//
//        if(!count($staff->roles))
//            return view('back-end.errors.404');
        $role = new Role();
        $dataPermissions = $this->permissionRepoRepo->getPermissionByStatus(true);
        $permissions = [];
        foreach ($dataPermissions as $key => $permission){
            if(array_key_exists($permission['type_permission_id'], $permissions)){
                $permissions[$permission['type_permission_id']]['type_name'] = $permission->typePermission->name;
                $permissions[$permission['type_permission_id']]['childPermissions'][] = $permission;
            }else{
                $permissions[$permission['type_permission_id']]['type_name'] = $permission->typePermission->name;
                $permissions[$permission['type_permission_id']]['childPermissions'][] = $permission;
            }
        }
        return view('roles.authorization',[
            'user' => $user,
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function authorizationPost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data_roles['name'] = $request['name'];
        $data_roles['create_by'] = Auth::id();
        $role = $this->roleRepo->create($data_roles);
        $role->staffs()->attach($request->staff_id);
        $role->permissions()->attach($request->select_pre);
        return redirect(route('staffs.index'))->with('success', 'Cấp quyền thành công');
//        $role->
    }

    public function authorizationUpdate($staff_id, $role_id)
    {
        $checkPre = $this->roleStaffRepo->checkPermission($staff_id, $role_id);
        if(!$checkPre)
            return view('back-end.errors.404');

        $staff = $this->staffRepo->find($staff_id);
        if(!$staff)
            return view('back-end.errors.404');

        $role = $this->roleRepo->find($role_id);
        if(!$role)
            return view('back-end.errors.404');

        $dataPermissions = $this->permissionRepoRepo->getPermissionByStatus(true);

        $permissions = [];
        foreach ($dataPermissions as $key => $permission){
            if(array_key_exists($permission['type_permission_id'], $permissions)){
                $permissions[$permission['type_permission_id']]['type_name'] = $permission->typePermission->name;
                $permission['active'] = PermissionRole::where([['permission_id', $permission['id']],['role_id', $role_id]])->first();
                $permissions[$permission['type_permission_id']]['childPermissions'][] = $permission;
            }else{
                $permissions[$permission['type_permission_id']]['type_name'] = $permission->typePermission->name;
                $permission['active'] = PermissionRole::where([['permission_id', $permission['id']],['role_id', $role_id]])->first();
                $permissions[$permission['type_permission_id']]['childPermissions'][] = $permission;
            }
        }
        return view('back-end.roles.authorization-update',[
            'staff' => $staff,
            'role' => $role,
            'permissions' => $permissions
        ]);
    }
    public function authorizationUpdatePost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $role_id = $request['role_id'];
        $role = $this->roleRepo->find($role_id);
        if(!$role)
            return view('back-end.errors.404');

        $data['name'] = $request['name'];
        $this->roleRepo->update($data, $role_id);
        $role->permissions()->sync($request->select_pre);
        return redirect(route('staffs.index'))->with('success', 'Cấp nhật quyền thành công');
    }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Request $request
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy(Request $request)
    {
        $id = $request['id'];
        $role = $this->roleRepo->find($id);
        if(!$role)
            return view('back-end.errors.404');

        $role->permissions()->detach();
        $role->staffs()->detach();
        $role->delete();

        return true;
    }
}
