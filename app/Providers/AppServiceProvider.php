<?php

namespace App\Providers;

use App\Models\BookAirTicket;
use App\Models\BookGuide;
use App\Models\BookHotel;
use Illuminate\Support\ServiceProvider;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        if(isset(Auth::user()->id)) {
//            View::composer('frontend.includes.header', function ($view) {
//                $view->with('hotel_bookings', BookHotel::where('user_id', Auth::user()->id));
//            });
//            View::composer('frontend.includes.header', function ($view) {
//                $view->with('guide_bookings', BookGuide::where('user_id', Auth::user()->id));
//            });
//            View::composer('frontend.includes.header', function ($view) {
//                $view->with('ticket_bookings', BookAirTicket::where('user_id', Auth::user()->id));
//            });
//        }
    }
}
