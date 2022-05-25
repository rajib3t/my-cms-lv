<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateAdminUserRequest;
use App\Http\Requests\UpdateAdminUserRequest;
use App\Http\Requests\ChangePasswordAdminUserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::paginate(15);
        return view('admin.users.admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name','admin')->pluck('name','id')->all();
        return view('admin.users.admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateAdminUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAdminUserRequest $request)
    {
        $user = Admin::create([
            'name'=>$request->firstname . ' ' . $request->lastname,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password)
        ]);
        if($user){
            $user->assignRole($request->roles);
            return redirect()->route('admin.user.admin.list')->with('success','Admin User created successfully');
        }else{
            return redirect()->route('admin.user.admin.list')->with('error','Admin User not created');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = Role::where('guard_name','admin')->pluck('name','id')->all();
        return view('admin.users.admin.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminUserRequest $request, $id)
    {
        $user=Admin::find($id);

        $data = [
            'name'=>$request->firstname . ' ' . $request->lastname,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
        ];
        $res = $user->update($data);
        if($res){
            $user->assignRole($request->roles);
            return redirect()->route('admin.user.admin.edit',$id)->with('success','Admin User updated successfully');
        }else{
            return redirect()->route('admin.user.admin.edit',$id)->with('error','Admin User not updated');
        }
    }
    /**
     * Change Password page of admin user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function password_change($id)
    {
        $user = Admin::find($id);
        return view('admin.users.admin.change_password',compact('user'));
    }
    /**
     * Update Password of admin user.
     * @param \App\Http\Requests $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password_update(ChangePasswordAdminUserRequest $request, $id)
    {
        $user = Admin::find($id);
        $data = [
            'password'=>Hash::make($request->password)
        ];
        $res = $user->update($data);
        if($res){
            return redirect()->route('admin.user.admin.password.change',$id)->with('success','Admin User password updated successfully');
        }else{
            return redirect()->route('admin.user.admin.password.change',$id)->with('error','Admin User password not updated');
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
        $user = Admin::find($id);
        $res = $user->delete();
        if($res){
            return redirect()->route('admin.user.admin.list')->with('success','Admin User deleted successfully');
        }else{
            return redirect()->route('admin.user.admin.list')->with('error','Admin User not deleted');
        }
    }
    /**
     * To view trashed admin users.
     *
     * @return \Illuminate\View\View
     */
    public function trash()
    {
        $users = Admin::onlyTrashed()->paginate(15);
        return view('admin.users.admin.trash',compact('users'));
    }
    /**
     * Restore the specified admin user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $user = Admin::onlyTrashed()->find($id);
        $res = $user->restore();
        if($res){
            return redirect()->route('admin.user.admin.trash')->with('success','Admin User restored successfully');
        }else{
            return redirect()->route('admin.user.admin.trash')->with('error','Admin User not restored');
        }
    }

}
