<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateAdminUserRequest;
use App\Http\Requests\UpdateAdminUserRequest;

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
    public function changePassword($id)
    {
        $user = Admin::find($id);
        return view('admin.users.admin.change_password',compact('user'));
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
