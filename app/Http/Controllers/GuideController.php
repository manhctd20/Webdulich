<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GuideController extends Controller
{

    //
    public function add_guide()
    {
        return view('admin.guide.add-guide',[
            'locations'=>Location::get(),
            'tours'=> Tour::get(),
        ]);
    }


    public function save_guide(Request $request)
    {
        Tour::save_tour($request);
        Alert::toast('Tour Guide added successfully','success');
        return back();
    }

    public function manage_guide()
    {

        return view('admin.guide.manage-guide',[
            'tours'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name as location_name')
                ->get(),
        ]);
    }

    public function edit_guide($id)
    {
        $guide_data = Tour::find($id);
        return view('admin.guide.edit-guide',[
            'locations'=>Location::get(),
            // 'spots'=>TouristSpot::where('location_id',$guide_data->location_id)->get(),
            'tour'=>Tour::find($id),
        ]);
    }

    public function update_guide(Request $request)
    {
        Tour::update_tour($request);
        Alert::toast('Tour Updated Successfully','success');

        return redirect()->route('manage.guide');
    }

    public function delete_guide(Request $request)
    {
        $guide = Tour::find($request->id);
        if($guide->image){
            unlink($guide->image);
        }
        $guide->delete();
        Alert::toast('Tour deleted successfully','success');

        return back();
    }
}
