<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Setting;
class AdminSetttingController extends Controller
{
    /**
     * Display a Common setting.
     * @return \Illuminate\View\View
     */
    public function general_settings()
    {
        return view('admin.users.admin.settings.general');
    }
    public function general_settings_update(Request $request)
    {
        $validated = $request->validate([
            'admin_per_page_pagination' => 'required',

        ]);
        Setting::admin_setting_update('admin_per_page_pagination', $request->admin_per_page_pagination);


        return redirect()->back()->with('success', 'General Settings Updated Successfully');
    }
}
