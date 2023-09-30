<?php

namespace App\Http\Controllers;

use App\Models\AirTicket;
use App\Models\BookAirTicket;
use App\Models\BookGuide;
use App\Models\BookHotel;
use App\Models\Guide;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\TouristSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    //
    public function index()
    {

        return view('frontend.home.index',[
            'hotels' =>Hotel::get(),
            'tickets'=>AirTicket::get(),
            'guides'=>Guide::get(),
        ]);
    }

    public function hotel_list()
    {

        return view('frontend.hotel.hotel-list',[
            'locations'=>Location::get(),
            'hotels'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->paginate(10),
        ]);
    }

    public function hotel_details($id)
    {
        $hotel_data = Hotel::find($id);
        return view('frontend.hotel.hotel-details',[
            'hotel'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->where('hotels.id',$id)
                ->first(),
            'interests'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->where('locations.id',$hotel_data->location_id)
                ->take(4)
                ->get(),
        ]);
    }

    public function hotel_book(Request $request)
    {
        BookHotel::book_hotel($request);
        Alert::toast('Hotel Booked Successfully');

        return redirect()->route('hotel.list');
    }

    public function guide_list()
    {
        return view('frontend.guide.guide-list',[
            'locations'=>Location::get(),
            'spots'=>TouristSpot::get(),
            'guides'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->paginate(10),
        ]);
    }

    public function guide_details($id)
    {
        $guide_data = Guide::find($id);
        return view('frontend.guide.guide-details',[
            'spots'=>TouristSpot::get(),
            'guide'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->where('guides.id',$id)
                ->first(),
            'interests'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->where('guides.location_id',$guide_data->location_id)
                ->take(4)
                ->get()
        ]);
    }

    public function guide_payment(Request $request)
    {
        return view('frontend.guide.guide-payment',[
            'data'=>$request,
        ]);
    }

    public function hotel_payment(Request $request)
    {
//        return $request;
        return view('frontend.hotel.hotel-payment',[
            'data'=>$request,
        ]);
    }

    public function guide_book(Request $request)
    {

        BookGuide::book_guide($request);
        Alert::toast('Guide Booked Successfully');

        return redirect()->route('guide.list');
    }

    public function air_ticket_list()
    {
        return view('frontend.airTicket.air-ticket-list',[
            'locations'=>Location::get(),
            'air_tickets'=>DB::table('air_tickets')->paginate(10),
        ]);
    }

    public function air_ticket_details($id)
    {
        $data = AirTicket::find($id);
        return view('frontend.airTicket.air-ticket-details',[
            'business'=>BookAirTicket::where('sit_type','business_class'),
            'economy'=>BookAirTicket::where('sit_type','economy_class'),
            'locations'=>Location::get(),
            'ticket'=>AirTicket::find($id),
            'interest'=>AirTicket::where('destination_location_id',$data->destination_location_id)->take(4)->get(),
        ]);
    }

    public function pay_ticket_price(Request $request)
    {

        return view('frontend.airTicket.air-ticket-payment',[
            'data'=>$request,
        ]);
    }

    public function ticket_book(Request $request)
    {

        BookAirTicket::book_ticket($request);
        Alert::toast('Air Ticket Booked Successfully');

        return redirect()->route('air.ticket.list');
    }

//    location by hotel start
    public function get_location_hotel($id)
    {
        return view('frontend.hotel.hotel-list',[
            'locations'=>Location::get(),
            'hotels'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->where('location_id',$id)
                ->paginate(10),
        ]);
    }
//    location by hotel end
    public function get_location_guide($id)
    {
        return view('frontend.guide.guide-list',[
            'locations'=>Location::get(),
            'spots'=>TouristSpot::get(),
            'guides'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->where('location_id',$id)
                ->paginate(10),
        ]);

    }

    public function get_spot_guide($id)
    {
        return view('frontend.guide.guide-list-by-spot',[
            's_id'=>$id,
            'locations'=>Location::get(),
            'spots'=>TouristSpot::get(),
            'guides'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->paginate(10),
        ]);
    }

    public function get_start_location_ticket($id)
    {
        return view('frontend.airTicket.air-ticket-list',[
            'locations'=>Location::get(),
            'air_tickets'=>DB::table('air_tickets')
                ->where('start_location_id',$id)
                ->paginate(10),
        ]);
    }

    public function get_destination_ticket($id)
    {
        return view('frontend.airTicket.air-ticket-list',[
            'locations'=>Location::get(),
            'air_tickets'=>DB::table('air_tickets')
                ->where('destination_location_id',$id)
                ->paginate(10),
        ]);
    }
}
