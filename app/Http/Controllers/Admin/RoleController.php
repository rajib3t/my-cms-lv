<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRole;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(2);
        return view('admin.acl.roles.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $guards = $this->gourds;
        $role = Role::find($id);
        return view('admin.acl.roles.edit',compact('guards','role'));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
}
