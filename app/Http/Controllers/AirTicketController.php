<?php

namespace App\Http\Controllers;

use App\Models\AirTicket;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AirTicketController extends Controller
{
    //
    public function add_airTicket()
    {
        return view('admin.airTicket.add-airTicket',[
            'locations'=>Location::get(),
        ]);
    }

    public function save_airTicket(Request $request)
    {
        AirTicket::save_airTicket($request);
        Alert::toast('Air Ticket added successfully');
        return back();
    }

    public function manage_airTicket()
    {

        return view('admin.airTicket.manage-airTicket',[
            'locations'=>Location::get(),
            'air_tickets'=>AirTicket::get(),
        ]);
    }

    public function edit_airTicket($id)
    {
        return view('admin.airTicket.edit-airTicket',[
            'locations'=>Location::get(),
            'air_ticket'=>AirTicket::find($id),
        ]);
    }

    public function update_airTicket(Request $request)
    {
        AirTicket::update_airTicket($request);
        Alert::toast('Air Ticket Updated Successfully');

        return back();
    }

    public function delete_airTicket(Request $request)
    {
        $ticket = AirTicket::find($request->id);
        if($ticket->image){
            unlink($ticket->image);
        }
        $ticket->delete();
        Alert::toast('Air Ticket deleted successfully');

        return back();

    }
}
