<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateProfilePasswordRequest;

class ProfileController extends Controller
{
    /**
     * To show the profile of the logged in user
     * @return \Illuminatie\View\View
     */
    public function profile()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.profile', compact('user'));
    }
    /**
     * Update logged user profile
     *
     * @param  \App\Http\Requests\UpdateAdminUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile_update(UpdateProfileRequest $request,$id)
    {
        $user = Admin::find($id);
        $data = [
            'name' => $request->firstname .' '.$request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ];
        $res = $user->update($data);
        if($res){
            return redirect()->route('admin.user.admin.profile')->with('success','Profile updated successfully');
        }else{
            return redirect()->route('admin.user.admin.profile')->with('error','Profile not updated');
        }

    }
    /**
     * Update logged user password change
     *
     * @return \Illuminate\View\View
     */
    public function change_password()
    {
        return view('admin.profile.change_password');
    }
    /**
     * Update logged user password change
     *
     * @param  \App\Http\Requests\UpdateAdminUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_password(UpdateProfilePasswordRequest $request)
    {
        $user = Auth::guard('admin')->user();
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if (Hash::check($request->old_password, $user->password)) {
            $data = [
                'password'=>Hash::make($request->password)
            ];
            $useradmin = Admin::find($user->id);
            $res = $useradmin->update($data);

            if($res){
                return redirect()->route('admin.user.admin.profile.password.change')->with('success','Password updated successfully');
            }else{
                return redirect()->route('admin.user.admin.profile.password.change')->with('error','Password not updated');
            }
        }else{
            return redirect()->route('admin.user.admin.profile.password.change')->with('error','Old password is incorrect');
        }
    }
}
