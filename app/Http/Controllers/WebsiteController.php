<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    //
    public function index()
    {

        return view('frontend.home.index',[
            'tours'=>Tour::get(),
        ]);
    }

    public function about_us()
    {
        return view('frontend.about.about-us');
    }

    public function tour_list()
    {
        return view('frontend.tour.tour-list',[
            'locations'=>Location::get(),
            'tours'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name')
                ->paginate(5),
        ]);
    }

    public function tour_details($id)
    {
        $tour_data = Tour::find($id);
        return view('frontend.tour.tour-details',[
            'tour'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name')
                ->where('tours.id',$id)
                ->first(),
            'interests'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name')
                ->where('tours.location_id',$tour_data->location_id)
                ->take(4)
                ->get()
        ]);
    }

    public function tour_payment(Request $request)
    {
        return view('frontend.tour.tour-payment',[
            'data'=>$request,
        ]);
    }

    public function get_location_tour($id)
    {
        return view('frontend.tour.tour-list',[
            'locations'=>Location::get(),
            'tours'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name')
                ->where('location_id',$id)
                ->paginate(10),
        ]);
    }

    public function guide_book(Request $request)
    {

        Order::book_guide($request);
        Alert::toast('Guide Booked Successfully');

        return redirect()->route('guide.list');
    }
}
