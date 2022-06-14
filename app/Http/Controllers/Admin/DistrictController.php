<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Slug;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;

class DistrictController extends Controller
{
    /**
     * Display a listing of the all disticts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $districts = District::paginate(15);
        return view('admin.organisations.districts.index',compact('districts'));
    }

    /**
     * Show the form for creating a new distrct.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.organisations.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateDistrictRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateDistrictRequest $request)
    {
        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'slug'=>Slug::district($request->name),
        ];

        $district = District::create($data);

        if($district){
            $address = [
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
            ];
            $district->address()->create($address);
            return redirect()->route('admin.organisation.district.list')->with('success','District created successfully');
        }else{
            return back()->withErrors([
                'error' => 'District creation failed. Please try again.',
            ]);
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
     * Show the form for editing the specified district.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('admin.organisations.districts.edit',compact('district'));
    }

    /**
     * Update the specified district in storage.
     *
     * @param  \App\Http\Requests\UpdateDistrictRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDistrictRequest $request, $id)
    {
        $district = District::findOrFail($id);
        $data = [
            'name' => $request->name,
            'code' => $request->code,
        ];
        $res = $district->update($data);
        if($res){
            $address = [
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'district' => $request->district,
                'postal_code' => $request->postal_code,

            ];
            if($district->address()->first()){
                $district->address()->update($address);
            }else{
                $district->address()->create($address);
            }

            return redirect()->route('admin.organisation.district.edit',$id)->with('success','District updated successfully');
        }else{
            return back()->withErrors([
                'error' => 'District update failed. Please try again.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $res = $district->delete();
        if($res){
            return redirect()->route('admin.organisation.district.list')->with('success','District deleted successfully');
        }else{
            return back()->withErrors([
                'error' => 'District deletion failed. Please try again.',
            ]);
        }
    }

    /**
     * Display a listing of the all deleted districts.
     *
     * @return \Illuminate\View\View
     */
    public function trashed()
    {
        $districts = District::onlyTrashed()->paginate(15);
        return view('admin.organisations.districts.trash',compact('districts'));
    }
    /**
     * Restore the specified district from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $district = District::withTrashed()->findOrFail($id);
        $res = $district->restore();
        if($res){
            return redirect()->route('admin.organisation.district.trash')->with('success','District restored successfully');
        }else{
            return back()->withErrors([
                'error' => 'District restore failed. Please try again.',
            ]);
        }
    }
}
