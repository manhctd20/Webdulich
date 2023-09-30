<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TouristSpotController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AirTicketController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ManageBookingController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WebsiteController::class,'index'])->name('frontend');
Route::get('/hotel-list',[WebsiteController::class,'hotel_list'])->name('hotel.list');
Route::get('/hotel-details/{id}',[WebsiteController::class,'hotel_details'])->name('hotel.details');
Route::get('/hotel-payment',[WebsiteController::class,'hotel_payment'])->name('hotel.payment')->middleware('is_admin');

Route::post('/hotel-book',[WebsiteController::class,'hotel_book'])->name('hotel.book')->middleware('is_admin');

Route::get('/guide-list',[WebsiteController::class,'guide_list'])->name('guide.list');
Route::get('/guide-details/{id}',[WebsiteController::class,'guide_details'])->name('guide.details');
Route::get('/guide-payment',[WebsiteController::class,'guide_payment'])->name('guide.payment')->middleware('is_admin');

Route::post('/guide-book',[WebsiteController::class,'guide_book'])->name('guide.book')->middleware('is_admin');

Route::get('/air-ticket-list',[WebsiteController::class,'air_ticket_list'])->name('air.ticket.list');
Route::get('/air-ticket-details/{id}',[WebsiteController::class,'air_ticket_details'])->name('air.ticket.details');

Route::get('/pay-ticket-price',[WebsiteController::class,'pay_ticket_price'])->name('pay.ticket.price')->middleware('is_admin');
Route::post('/ticket-book',[WebsiteController::class,'ticket_book'])->name('ticket.book')->middleware('is_admin');

//filter by location start
Route::get('/location-by-hotel/{id}',[WebsiteController::class,'get_location_hotel'])->name('location.hotel');
Route::get('/location-by-guide/{id}',[WebsiteController::class,'get_location_guide'])->name('location.guide');
Route::get('/spot-by-guide/{id}',[WebsiteController::class,'get_spot_guide'])->name('spot.guide');
Route::get('/startLocation-by-ticket/{id}',[WebsiteController::class,'get_start_location_ticket'])->name('start.location.ticket');
Route::get('/destinationLocation-by-ticket/{id}',[WebsiteController::class,'get_destination_ticket'])->name('destination.location.ticket');

//filter by location end

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


//location start
Route::get('/add-location', [LocationController::class, 'add_location'])->name('add.location')->middleware('is_admin');
Route::post('/save-location', [LocationController::class, 'save_location'])->name('save.location')->middleware('is_admin');
Route::get('/manage-location', [LocationController::class, 'manage_location'])->name('manage.location')->middleware('is_admin');
Route::get('/edit-location/{id}', [LocationController::class, 'edit_location'])->name('edit.location')->middleware('is_admin');
Route::post('/update-location', [LocationController::class, 'update_location'])->name('update.location')->middleware('is_admin');
Route::post('/delete-location', [LocationController::class, 'delete_location'])->name('delete.location')->middleware('is_admin');
//location end

//tourist spot start
Route::get('/add-spot', [TouristSpotController::class, 'add_spot'])->name('add.spot')->middleware('is_admin');
Route::post('/save-spot', [TouristSpotController::class, 'save_spot'])->name('save.spot')->middleware('is_admin');
Route::get('/manage-spot', [TouristSpotController::class, 'manage_spot'])->name('manage.spot')->middleware('is_admin');
Route::get('/edit-spot/{id}', [TouristSpotController::class, 'edit_spot'])->name('edit.spot')->middleware('is_admin');
Route::post('/update-spot', [TouristSpotController::class, 'update_spot'])->name('update.spot')->middleware('is_admin');
Route::post('/delete-spot', [TouristSpotController::class, 'delete_spot'])->name('delete.spot')->middleware('is_admin');
//tourist spot end

//Hotel start
Route::get('/add-hotel', [HotelController::class, 'add_hotel'])->name('add.hotel')->middleware('is_admin');
Route::post('/save-hotel', [HotelController::class, 'save_hotel'])->name('save.hotel')->middleware('is_admin');
Route::get('/manage-hotel', [HotelController::class, 'manage_hotel'])->name('manage.hotel')->middleware('is_admin');
Route::get('/edit-hotel/{id}', [HotelController::class, 'edit_hotel'])->name('edit.hotel')->middleware('is_admin');
Route::post('/update-hotel', [HotelController::class, 'update_hotel'])->name('update.hotel')->middleware('is_admin');
Route::post('/delete-hotel', [HotelController::class, 'delete_hotel'])->name('delete.hotel')->middleware('is_admin');
//Hotel end

//guide start
Route::get('/add-guide', [GuideController::class, 'add_guide'])->name('add.guide')->middleware('is_admin');
Route::get('/get-spot/{id}', [GuideController::class, 'get_spot'])->name('get.spot')->middleware('is_admin');
Route::post('/save-guide', [GuideController::class, 'save_guide'])->name('save.guide')->middleware('is_admin');
Route::get('/manage-guide', [GuideController::class, 'manage_guide'])->name('manage.guide')->middleware('is_admin');
Route::get('/edit-guide/{id}', [GuideController::class, 'edit_guide'])->name('edit.guide')->middleware('is_admin');
Route::post('/update-guide', [GuideController::class, 'update_guide'])->name('update.guide')->middleware('is_admin');
Route::post('/delete-guide', [GuideController::class, 'delete_guide'])->name('delete.guide')->middleware('is_admin');
//guide end

//Air ticket start
Route::get('/add-airTicket', [AirTicketController::class, 'add_airTicket'])->name('add.airTicket')->middleware('is_admin');
Route::post('/save-airTicket', [AirTicketController::class, 'save_airTicket'])->name('save.airTicket')->middleware('is_admin');
Route::get('/manage-airTicket', [AirTicketController::class, 'manage_airTicket'])->name('manage.airTicket')->middleware('is_admin');
Route::get('/edit-airTicket/{id}', [AirTicketController::class, 'edit_airTicket'])->name('edit.airTicket')->middleware('is_admin');
Route::post('/update-airTicket', [AirTicketController::class, 'update_airTicket'])->name('update.airTicket')->middleware('is_admin');
Route::post('/delete-airTicket', [AirTicketController::class, 'delete_airTicket'])->name('delete.airTicket')->middleware('is_admin');
//air ticket end

//manage user hotel booking start
Route::get('/manage-hotel-booking', [ManageBookingController::class, 'manage_hotel_booking'])->name('manage.hotel.booking')->middleware('is_admin');
Route::get('/edit-hotel-booking/{id}', [ManageBookingController::class, 'edit_hotel_booking'])->name('edit.hotel.booking')->middleware('is_admin');
Route::get('/edit-hotel-payment', [ManageBookingController::class, 'edit_hotel_payment'])->name('edit.hotel.payment')->middleware('is_admin');
Route::post('/update-hotel-booking', [ManageBookingController::class, 'update_hotel_booking'])->name('update.hotel.booking')->middleware('is_admin');
Route::post('/delete-hotel-booking', [ManageBookingController::class, 'delete_hotel_booking'])->name('delete.hotel.booking')->middleware('is_admin');
//manage user booking end

//manage user guide booking start
Route::get('/manage-guide-booking', [ManageBookingController::class, 'manage_guide_booking'])->name('manage.guide.booking')->middleware('is_admin');
Route::get('/edit-guide-booking/{id}', [ManageBookingController::class, 'edit_guide_booking'])->name('edit.guide.booking')->middleware('is_admin');
Route::get('/edit-guide-payment', [ManageBookingController::class, 'edit_guide_payment'])->name('edit.guide.payment')->middleware('is_admin');
Route::post('/update-guide-booking', [ManageBookingController::class, 'update_guide_booking'])->name('update.guide.booking')->middleware('is_admin');
Route::post('/delete-guide-booking', [ManageBookingController::class, 'delete_guide_booking'])->name('delete.guide.booking')->middleware('is_admin');
////manage user booking end

//manage user air ticket booking start
Route::get('/manage-ticket-booking', [ManageBookingController::class, 'manage_ticket_booking'])->name('manage.ticket.booking')->middleware('is_admin');
Route::get('/edit-ticket-booking/{id}', [ManageBookingController::class, 'edit_ticket_booking'])->name('edit.ticket.booking')->middleware('is_admin');
Route::get('/edit-ticket-payment', [ManageBookingController::class, 'edit_ticket_payment'])->name('edit.ticket.payment')->middleware('is_admin');
Route::post('/update-ticket-booking', [ManageBookingController::class, 'update_ticket_booking'])->name('update.ticket.booking')->middleware('is_admin');
Route::post('/delete-ticket-booking', [ManageBookingController::class, 'delete_ticket_booking'])->name('delete.ticket.booking')->middleware('is_admin');
//manage user booking end
