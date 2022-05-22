<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $guard_arr = config('auth.guards');
        $guards = array_keys($guard_arr);
        $guards = array_combine($guards, $guards);
        unset($guards['sanctum']);
        $this->gourds  = $guards;
    }
    /**
     * Display a listing of the roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(2);
        return view('admin.acl.roles.list',compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guards = $this->gourds;
        return view('admin.acl.roles.create',compact('guards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateRole  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $role = Role::create([
            'name'=>$request->name,
            'guard_name'=>$request->guard
        ]);
        if($role){
            return redirect()->route('admin.role.list')->with('success','Role created successfully');
        }else{
            return redirect()->route('admin.role.list')->with('error','Role not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $guards = $this->gourds;
        $role = Role::find($id);
        $permissions = $role->permissions()->get();
        return view('admin.acl.roles.edit',compact('guards','role','permissions'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard;
        if($role->save()){
            return redirect()->route('admin.role.edit',$id)->with('success','Role updated successfully');
        }else{
            return redirect()->route('admin.role.edit',$id)->with('error','Role not updated');
        }
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = Role::destroy($id);
        if($role){
            return redirect()->route('admin.role.list')->with('success','Role deleted successfully');
        }else{
            return redirect()->route('admin.role.list')->with('error','Role not deleted');
        }
    }
    /**
     * view add permissions to specific role
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function add_permission($id)
    {

        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.acl.roles.add_permission',compact('role','permissions'));
    }
    /**
     * add permissions to specific role
     *
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_permission(Request $request,$id)
    {
        $role = Role::find($id);
        $permissions = $request->permissions;
        $res = $role->syncPermissions($permissions);
        if($res){
            return redirect()->route('admin.role.add_permission',$id)->with('success','Permissions added successfully');
        }else{
            return redirect()->route('admin.role.add_permission',$id)->with('error','Permissions not added');
        }
    }

    /**
     * to remove permission to specific role
     *
     * @param int $id
     * @param int $permission_id
     * @return \Illuminate\View\View
     */
    public function remove_permission($id,$permission_id){
        $role = Role::find($id);
        $res = $role->revokePermissionTo($permission_id);
        if($res){
            return redirect()->route('admin.role.add_permission',$id)->with('success','Permission removed successfully');
        }else{
            return redirect()->route('admin.role.add_permission',$id)->with('error','Permission not removed');
        }

    }

    /**
    * Add Single Permission to Role
    *
    * @param int $role_id
    * @param int $permission_id
    * @return @return \Illuminate\Http\RedirectResponse
    */
   public function add_single_permission($role_id,$permission_id)
   {
        $role = Role::find($role_id);
        $res = $role->givePermissionTo($permission_id);
        if($res){
            return redirect()->route('admin.role.add_permission',$role_id)
            ->with('success','Permission added successfully');
        }else{
            return redirect()->route('admin.role.add_permission',$role_id)
            ->with('error','Somthing is wrong...');
        }
   }
}
