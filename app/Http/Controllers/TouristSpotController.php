<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\TouristSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TouristSpotController extends Controller
{
    //
    public function add_spot()
    {
        return view('admin.tourist-spot.add-spot',[
            'locations'=>Location::get(),
        ]);
    }

    public function save_spot(Request $request)
    {
        TouristSpot::save_spot($request);
        Alert::toast('Spot Added Successfully');

        return back();
    }

    public function manage_spot()
    {
        return view('admin.tourist-spot.manage-spot',[
            'spots'=>DB::table('tourist_spots')
                    ->join('locations','locations.id','tourist_spots.location_id')
                    ->select('tourist_spots.*','locations.location_name')
                    ->get(),
        ]);
    }

    public function edit_spot($id)
    {
        return view('admin.tourist-spot.edit-spot',[
            'locations'=>Location::get(),
            'spot'=>TouristSpot::find($id),
        ]);
    }

    public function update_spot(Request $request)
    {
//        return $request;
        TouristSpot::update_spot($request);
        Alert::toast('Tourist Spot Updated Successfully');

        return back();
    }

    public function delete_spot(Request $request)
    {
        TouristSpot::find($request->id)->delete();
        Alert::toast('Spot deleted successfully');
        return back();
    }
}
