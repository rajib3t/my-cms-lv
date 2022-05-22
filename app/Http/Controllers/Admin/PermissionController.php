<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PermissionDetail;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
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
     * Display a listing of the permission.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::paginate(15);
        return view('admin.acl.permissions.list', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $guards = $this->gourds;
        return view('admin.acl.permissions.create',compact('guards'));
    }

    /**
     * Store a newly created permission in storage.
     *
     * @param  \App\Http\Requests\CreatePermissionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePermissionRequest $request)
    {
        $permission = Permission::create([
            'name'=>$request->name,
            'guard_name'=>$request->guard,

        ]);
        if($permission){
            $des = PermissionDetail::create(['permission_id'=>$permission->id,'description'=>$request->description]);
            return redirect()->route('admin.permission.list')->with('success','Permission created successfully');
        }
        return redirect()->route('admin.permission.list')->with('error','Permission not created');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guards = $this->gourds;
        $permission = Permission::find($id);
        $permissioneDetail = PermissionDetail::where('permission_id',$id)->first();
        return view('admin.acl.permissions.edit',compact('permission','guards','permissioneDetail'));
    }

    /**
     * Update the specified permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        $permission = Permission::find($id);
        $res = $permission->update([
            'name'=>$request->name,
            'guard_name'=>$request->guard,
        ]);
        if($res){
            $des = PermissionDetail::where('permission_id',$id)->update(['description'=>$request->description]);
            return redirect()->route('admin.permission.edit',$id)->with('success','Permission updated successfully');
        }else{
            return redirect()->route('admin.permission.edit',$id)->with('error','Permission not updated');
        }

    }

    /**
     * Remove the specified permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $res = $permission->delete();
        if($res){
            return redirect()->route('admin.permission.list')->with('success','Permission deleted successfully');
        }else{
            return redirect()->route('admin.permission.list')->with('error','Permission not deleted');
        }
    }
    /**
     * To view the add role to permission
     *
     * @param int $permission_id
     * @return \Illuminate\View\View
     */
    public function add_role($permission_id)
    {
        $permission = Permission::find($permission_id);
        $roles = Role::all();
        return view('admin.acl.permissions.add_role',compact('permission','roles'));
    }
    /**
     * To add roles to permission
     *
     * @param \Illuminate\Http\Request $request
     * @param int $permission_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_role(Request $request,$permission_id)
    {
        $permission = Permission::find($permission_id);
        $res = $permission->syncRoles($request->roles);
        if($res){
            return redirect()->route('admin.permission.add_role',$permission_id)->with('success','Role added successfully');
        }else{
            return redirect()->route('admin.permission.add_role',$permission_id)->with('error','Role not added');
        }

    }

    public function remove_role($permission_id,$role_id)
    {
        $permission = Permission::find($permission_id);
        $res = $permission->removeRole($role_id);
        if($res){
            return redirect()->route('admin.permission.add_role',$permission_id)->with('success','Role removed successfully');
        }else{
            return redirect()->route('admin.permission.add_role',$permission_id)->with('error','Role not removed');
        }
    }

    public function add_single_role($permission_id,$role_id)
    {
        $permission = Permission::find($permission_id);
        $res = $permission->assignRole($role_id);
        if($res){
            return redirect()->route('admin.permission.add_role',$permission_id)->with('success','Role added successfully');
        }else{
            return redirect()->route('admin.permission.add_role',$permission_id)->with('error','Role not added');
        }
    }
}
