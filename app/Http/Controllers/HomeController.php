<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Tour;
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
            'guides'=>Order::where('user_id',Auth::user()->id)
        ]);
    }
    public function adminHome()
{
    $ordersData = Order::getOrdersData(); 

    // Separate data into arrays for Highcharts
    $completedOrdersData = $ordersData->pluck('completed_orders')->toArray();
    $canceledOrdersData = $ordersData->pluck('canceled_orders')->toArray();
    $categoriesForChart = $ordersData->pluck('date')->toArray();

    // Uncomment the following line for debugging
    // dd($completedOrdersData, $canceledOrdersData, $categoriesForChart);

    return view('admin.home.index', [
        'completedOrdersData' => json_encode($completedOrdersData),
        'canceledOrdersData' => json_encode($canceledOrdersData),
        'categoriesForChart' => json_encode($categoriesForChart),
    ]);
}
}
