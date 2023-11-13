<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManageBookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/search', [WebsiteController::class,'search'])->name('search');

Route::post('/review', [ReviewController::class,'store'])->name('review.store');

Route::get('/about-us',[WebsiteController::class,'about_us'])->name('about');

Route::get('/tour-list',[WebsiteController::class,'tour_list'])->name('tour.list');

Route::get('/tour-details/{id}',[WebsiteController::class,'tour_details'])->name('tour.details');

Route::get('/tour-payment',[WebsiteController::class,'tour_payment'])->name('tour.payment')->middleware('is_admin');

Route::post('/tour-book',[WebsiteController::class,'tour_book'])->name('tour.book')->middleware('is_admin');

//filter by location start

Route::get('/location-by-tour/{id}',[WebsiteController::class,'get_location_tour'])->name('location.tour');

//filter by location end

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/manage-orders', [OrderController::class,'index'])->name('order')->middleware('is_admin');

Route::get('/manage-users', [UserController::class,'index'])->name('manage.users')->middleware('is_admin');
Route::post('/delete-users', [UserController::class,'delete_user'])->name('delete.user')->middleware('is_admin');

Route::get('/manage-reviews', [ReviewController::class,'index'])->name('manage.reviews')->middleware('is_admin');
Route::post('/delete-reviews', [ReviewController::class,'delete_review'])->name('delete.review')->middleware('is_admin');

Route::get('/change-info/{id}', [UserController::class,'edit'])->name('change-info');
Route::get('/update/{id}', [UserController::class,'update'])->name('update-info');

Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');

//location start
Route::get('/add-location', [LocationController::class, 'add_location'])->name('add.location')->middleware('is_admin');
Route::post('/save-location', [LocationController::class, 'save_location'])->name('save.location')->middleware('is_admin');
Route::get('/manage-location', [LocationController::class, 'manage_location'])->name('manage.location')->middleware('is_admin');
Route::get('/edit-location/{id}', [LocationController::class, 'edit_location'])->name('edit.location')->middleware('is_admin');
Route::post('/update-location', [LocationController::class, 'update_location'])->name('update.location')->middleware('is_admin');
Route::post('/delete-location', [LocationController::class, 'delete_location'])->name('delete.location')->middleware('is_admin');
//location end

//guide start
Route::get('/add-guide', [GuideController::class, 'add_guide'])->name('add.guide')->middleware('is_admin');
Route::get('/get-spot/{id}', [GuideController::class, 'get_spot'])->name('get.spot')->middleware('is_admin');
Route::post('/save-guide', [GuideController::class, 'save_guide'])->name('save.guide')->middleware('is_admin');
Route::get('/manage-guide', [GuideController::class, 'manage_guide'])->name('manage.guide')->middleware('is_admin');
Route::get('/edit-guide/{id}', [GuideController::class, 'edit_guide'])->name('edit.guide')->middleware('is_admin');
Route::post('/update-guide', [GuideController::class, 'update_guide'])->name('update.guide')->middleware('is_admin');
Route::post('/delete-guide', [GuideController::class, 'delete_guide'])->name('delete.guide')->middleware('is_admin');
//guide end


//manage user guide booking start
Route::get('/manage-tour-booking', [ManageBookingController::class, 'manage_tour_booking'])->name('manage.tour.booking')->middleware('is_admin');
Route::get('/edit-tour-booking/{id}', [ManageBookingController::class, 'edit_tour_booking'])->name('edit.tour.booking')->middleware('is_admin');
Route::post('/update-tour-booking', [ManageBookingController::class, 'update_tour_booking'])->name('update.tour.booking')->middleware('is_admin');
// Route::post('/delete-guide-booking', [ManageBookingController::class, 'delete_guide_booking'])->name('delete.guide.booking')->middleware('is_admin');
Route::delete('/cancel-booking/{id}', [ManageBookingController::class, 'cancelBooking'])->name('cancel.tour.booking');
////manage user booking end

Route::post('/accept-tour-booking/{id}', [OrderController::class, 'acceptOrder'])->name('acceptOrder')->middleware('is_admin');
