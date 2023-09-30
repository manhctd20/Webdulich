<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HotelController extends Controller
{
    //
    public function add_hotel()
    {
        return view('admin.hotel.add-hotel',[
            'locations'=>Location::get(),
        ]);
    }

    public function save_hotel(Request $request)
    {
        Hotel::save_hotel($request);
        Alert::toast('Hotel added successfully');
        return back();
    }

    public function manage_hotel()
    {
        return view('admin.hotel.manage-hotel',[
            'hotels'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->get(),
        ]);
    }

    public function edit_hotel($id)
    {
        return view('admin.hotel.edit-hotel',[
            'locations'=>Location::get(),
            'hotel'=>Hotel::find($id),
        ]);
    }

    public function update_hotel(Request $request)
    {
        Hotel::update_hotel($request);
        Alert::toast('hotel Updated Successfully');

        return back();
    }

    public function delete_hotel(Request $request)
    {
        $hotel = Hotel::find($request->id);
        if($hotel->image){
            unlink($hotel->image);
        }
        $hotel->delete();
        Alert::toast('Hotel deleted successfully');

        return back();
    }
}
