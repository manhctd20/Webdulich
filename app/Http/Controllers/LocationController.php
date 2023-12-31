<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Location;
use RealRashid\SweetAlert\Facades\Alert ;

class LocationController extends Controller
{
    //
    public function add_location()
    {
        return view('admin.location.add-location');
    }

    public function save_location(Request $request)
    {
        Location::save_location($request);
        Alert::toast('Location Added Successfully','success');

        return back();
    }

    public function manage_location()
    {
        return view('admin.location.manage-location',[
            'locations'=>Location::get(),
        ]);
    }

    public function edit_location($id)
    {
        return view('admin.location.edit-location',[
            'location'=>Location::find($id),
        ]);
    }

    public function update_location(Request $request)
    {
        Location::update_location($request);
        Alert::toast('Location Updated Successfully','success');

        return redirect()->route("manage.location");
    }

    public function delete_location(Request $request)
    {
        Location::find($request->id)->delete();
        Alert::toast('Location deleted successfully','success');
        return back();
    }
}
