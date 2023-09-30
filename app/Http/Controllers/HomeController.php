<?php

namespace App\Http\Controllers;

use App\Models\AirTicket;
use App\Models\BookAirTicket;
use App\Models\BookGuide;
use App\Models\BookHotel;
use App\Models\Guide;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home.home',[
            'locations'=>Location::get(),
            'hotels'=>BookHotel::where('user_id',Auth::user()->id),
            'air_tickets'=>BookAirTicket::where('user_id',Auth::user()->id),
            'guides'=>BookGuide::where('user_id',Auth::user()->id)
        ]);
    }
    public function adminHome()
    {
        return view('admin.home.index',[
            'locations'=>Location::get(),
            'hotels'=>Hotel::get(),
            'air_tickets'=>AirTicket::get(),
            'guides'=>Guide::get()
        ]);
    }
}
