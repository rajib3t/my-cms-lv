<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Slug;
use App\Models\Samithi;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSamithiRequest;
use App\Http\Requests\UpdateSamithiRequest;

class SamithiController extends Controller
{
    /**
     * Display a listing of the Samithi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $samithis = Samithi::paginate(15);
        return view('admin.organisations.samithis.list',compact('samithis'));
    }

    /**
     * Show the form for creating a new Samithi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $districts = District::pluck('name','id')->toArray();
        return view('admin.organisations.samithis.create',compact('districts'));
    }

    /**
     * Store a newly created Samithi in storage.
     *
     * @param \App\Http\Requests\CreateSamithiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSamithiRequest $request)
    {

        $data = [
            'name' => $request->name,
            'district_id' => $request->samithi_district,
            'slug'=>Slug::samithi($request->name,$request->samithi_district),
        ];
        $res = Samithi::create($data);
        if($res){
            $address = [
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
            ];
            $res->address()->create($address);
            return redirect()->route('admin.organisation.samithi.list')->with('success','Samithi created successfully');
        }else{
            return redirect()->route('admin.organisation.samithi.list')->with('error','Samithi not created');
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
     * Show the form for editing the specified Samithi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $samithi = Samithi::findOrFail($id);
        $districts = District::pluck('name','id')->toArray();
        return view('admin.organisations.samithis.edit',compact('samithi','districts'));
    }

    /**
     * Update the specified Samithi in storage.
     *
     * @param  \App\Http\Requests\UpdateSamithiRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSamithiRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'district_id' => $request->samithi_district,
        ];
        $samithi = Samithi::findOrFail($id);
        $res =$samithi->update($data);
        if($res){
            $address = [
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'district' => $request->district,
                'postal_code' => $request->postal_code,
            ];
            if($samithi->address()->first()){
                $samithi->address()->update($address);
            }else{
                $samithi->address()->create($address);
            }

            return redirect()->route('admin.organisation.samithi.edit',$id)->with('success','Samithi updated successfully');
        }else{
            return redirect()->route('admin.organisation.samithi.edit',$id)->with('error','Samithi not updated');
        }
    }

    /**
     * Remove the specified Samithi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $samithi = Samithi::findOrFail($id);
        $res = $samithi->delete();
        if($res){
            return redirect()->route('admin.organisation.samithi.list')->with('success','Samithi deleted successfully');
        }else{
            return redirect()->route('admin.organisation.samithi.list')->with('error','Samithi not deleted');
        }
    }
    /**
     * List all Deleted Samithi.
     *
     * @return \Illuminate\View\View
     */
    public function trashed()
    {
        $samithis = Samithi::onlyTrashed()->paginate(15);
        return view('admin.organisations.samithis.trash',compact('samithis'));
    }
    /**
     * Restore the specified Samithi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */

    public function restore($id)
    {
        $samithi = Samithi::withTrashed()->findOrFail($id);
        $res = $samithi->restore();
        if($res){
            return redirect()->route('admin.organisation.samithi.trash')->with('success','Samithi restored successfully');
        }else{
            return redirect()->route('admin.organisation.samithi.trash')->with('error','Samithi not restored');
        }
    }
}
