<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Setting;
class SettingController extends Controller
{
    /**
     * Display a Common setting.
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * Update the General Setting.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_general(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required',
            'site_tag_line' => 'required',
            'timezome' => 'required',
            'language' => 'required',
        ]);
        Setting::update('site_name', $request->site_name);
        Setting::update('site_tag_line', $request->site_tag_line);
        Setting::update('timezome', $request->timezome);
        Setting::update('language', $request->language);

        return redirect()->back()->with('success', 'General Settings Updated Successfully');
    }
    /**
     * To view miscellaneous setting.
     *
     * @return \Illuminate\View\View
     */
    public function miscellaneous_settings()
    {
        return view('admin.settings.miscellaneous');
    }

    public function update_miscellaneous(Request $request)
    {
        $validated = $request->validate([
            'admin_per_page_pagination'=>'required|numeric',
        ]);
        Setting::update('admin_per_page_pagination', $request->admin_per_page_pagination);
        return redirect()->back()->with('success', 'Miscellaneous Settings Updated Successfully');
    }
}
