<?php

namespace App\Http\Controllers\Admins\settings;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationsController extends Controller
{
    

    public function index()
    {
        $designations = Designation::get();
        return view('admin.settings.designations.index',compact('designations'));
    }

    public function store(Request $request)
    {
        if($request->name)
        {
            $data['name'] = $request->name;
        }
        $data['user_id'] = auth()->user()->id;
        if(Designation::where('name',$request->name)->first())
        {

        }else{
            Designation::create($data);
        }
        return back()->with('success_message','done');
    }

    public function update(Request $request,Designation $designation)
    {
        if($request->name)
        {
            $data['name'] = $request->name;
        }
        $data['user_id'] = auth()->user()->id;
        if(Designation::where('name',$request->name)->first())
        {

        }else{
            Designation::create($data);
        }
        return back()->with('success_message','done');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        return back()->with('success_message','done');
    }
}
