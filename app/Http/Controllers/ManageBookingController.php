<?php

namespace App\Http\Controllers;

use App\Models\AirTicket;
use App\Models\BookAirTicket;
use App\Models\BookGuide;
use App\Models\BookHotel;
use App\Models\Location;
use App\Models\TouristSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ManageBookingController extends Controller
{
    //
    public function manage_hotel_booking()
    {
        return view('user.hotel-booking.manage-hotel-booking',[
            'bookings'=>DB::table('book_hotels')
                ->join('users','book_hotels.user_id','users.id')
                ->join('hotels','book_hotels.hotel_id','hotels.id')
                ->select('book_hotels.*','users.name','hotels.hotel_name')
                ->where('book_hotels.user_id',Auth::user()->id)
                ->get(),
        ]);
    }

    public function edit_hotel_booking($id)
    {
        $hote_data = BookHotel::find($id);

        return view('user.hotel-booking.edit-hotel-booking',[
            'locations'=>Location::get(),
            'single_data'=> $hote_data,
            'hotel'=>DB::table('hotels')
                ->join('locations','hotels.location_id','locations.id')
                ->select('hotels.*','locations.location_name')
                ->where('hotels.id',$hote_data->hotel_id)
                ->first(),
        ]);
    }

    public function update_hotel_booking(Request $request)
    {

        BookHotel::update_hotel_booking($request);
        Alert::toast('Hotel Book Updated Successfully');
        return redirect()->route('manage.hotel.booking');
    }

    public function delete_hotel_booking(Request $request)
    {
        $hotel = BookHotel::find($request->id);
        if($hotel->image){
            unlink($hotel->image);
        }
        $hotel->delete();
        Alert::toast('Booking deleted successfully');

        return back();
    }

    public function manage_guide_booking()
    {
        return view('user.guide-booking.manage-guide-booking',[
            'bookings'=>DB::table('book_guides')
                ->join('users','book_guides.user_id','users.id')
                ->join('guides','book_guides.guide_id','guides.id')
                ->select('book_guides.*','users.name','guides.guide_name')
                ->where('book_guides.user_id',Auth::user()->id)
                ->get(),
        ]);
    }
    public function edit_guide_booking($id)
    {
        $guide_booking = BookGuide::find($id);

        return view('user.guide-booking.edit-guide-booking',[
//            'locations'=>Location::get(),
            'spots'=>TouristSpot::get(),
            'single_guid' =>$guide_booking,
            'guide'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->where('guides.id',$guide_booking->guide_id)
                ->first(),
        ]);
    }


    public function update_guide_booking(Request $request)
    {

        BookGuide::update_guide_booking($request);
        Alert::toast('Guide Book Updated Successfully');

        return redirect()->route('manage.guide.booking');
    }

    public function delete_guide_booking(Request $request)
    {
        $guide = BookGuide::find($request->id);
        if($guide->image){
            unlink($guide->image);
        }
        $guide->delete();
        Alert::toast('Booking deleted successfully');

        return back();
    }

    public function manage_ticket_booking()
    {
        return view('user.ticket-booking.manage-ticket-booking',[
            'bookings'=>DB::table('book_air_tickets')
                ->join('users','book_air_tickets.user_id','users.id')
                ->join('air_tickets','book_air_tickets.ticket_id','air_tickets.id')
                ->select('book_air_tickets.*','users.name','air_tickets.air_name')
                ->where('book_air_tickets.user_id',Auth::user()->id)
                ->get(),
        ]);
    }

    public function edit_ticket_booking($id)
    {

        $single_data = BookAirTicket::find($id);
//        return $single_data;
        return view('user.ticket-booking.edit-ticket-booking',[
            'business'=>BookAirTicket::where('sit_type','business_class'),
            'economy'=>BookAirTicket::where('sit_type','economy_class'),
            'locations'=>Location::get(),
            'ticket'=>AirTicket::find($single_data->ticket_id),
            'single_data'=>$single_data,
        ]);
    }

    public function edit_ticket_payment(Request $request)
    {
        return view('frontend.airTicket.edit-air-ticket-payment',[
            'data'=>$request,
        ]);
    }

    public function edit_guide_payment(Request $request)
    {
//        return $request;
        return view('frontend.guide.edit-guide-payment',[
            'data'=>$request,
        ]);
    }

    public function edit_hotel_payment(Request $request)
    {

        return view('frontend.hotel.edit-hotel-payment',[
            'data'=>$request,
        ]);
    }

    public function update_ticket_booking(Request $request)
    {
//        return $request;
        BookAirTicket::update_ticket_booking($request);
        Alert::toast('Ticket Book Updated Successfully');

        return redirect()->route('manage.ticket.booking');
    }

    public function delete_ticket_booking(Request $request)
    {
        $ticket = BookAirTicket::find($request->id);
        if($ticket->image){
            unlink($ticket->image);
        }
        $ticket->delete();
        Alert::toast('Ticket Booking deleted successfully');

        return back();
    }
}
