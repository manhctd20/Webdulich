<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Review;
use App\Models\Tour;
use App\Models\User;
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
                ->select('tours.*','locations.name as location_name')
                ->paginate(5),
        ]);
    }

    public function tour_details($id)
    {
        $tour_data = Tour::find($id);

        $reviews = Review::where('tour_id', $id)->get();
        $users = [];

        foreach ($reviews as $review) {
            $user = User::find($review->user_id);
            $users[] = $user;
        }

        return view('frontend.tour.tour-details',[
            'tour'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name as location_name')
                ->where('tours.id',$id)
                ->first(),
            'interests'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name as location_name')
                ->where('tours.location_id',$tour_data->location_id)
                ->take(4)
                ->get(),
            'reviews'=>DB::table('reviews')
                ->join('tours','reviews.tour_id','tours.id')
                ->select('reviews.*')
                ->get(),
            'users'=>DB::table('users')
                ->join('reviews','users.id','reviews.user_id')
                ->select('users.*')
                ->get(),
        ]);
    }

    public function tour_payment(){
        $tours = Tour::get();
        $tourId = request()->query('tour_id');

        return view('frontend.tour.tour-payment', compact('tours', 'tourId'));
    }

    public function get_location_tour($id)
    {
        return view('frontend.tour.tour-list',[
            'locations'=>Location::get(),
            'tours'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name as location_name')
                ->where('location_id',$id)
                ->paginate(10),
        ]);
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('query'); 
    //     $locations = Location::get();
    
    //     $tours = Tour::where('name', 'like', "%$keyword%")
    //     ->orwhere("description", "like", "%$keyword%")
    //     ->paginate(10);
    //     $tours->appends(['page' => 1]);
       
    //     return view('frontend.tour.tour-list', [
    //     'tours'=>DB::table('tours')
    //     ->innerJoin('locations','tours.location_id','locations.id')
    //     ->select('tours.*','locations.name as location_name')
    //     ->paginate(10),
    //     ]);
    // }
    public function search(Request $request)
    {
        $keyword = $request->input('query'); 
        $locations = Location::get();
    
        $tours = DB::table('tours')
            ->join('locations', 'tours.location_id', '=', 'locations.id')
            ->select('tours.*', 'locations.name as location_name')
            ->where(function ($query) use ($keyword) {
                $query->where('tours.name', 'like', "%$keyword%")
                    ->orWhere('tours.description', 'like', "%$keyword%");
            })
            ->paginate(10);
            
        return view('frontend.tour.tour-list', [
            'tours' => $tours,
            'locations' => $locations,
        ]);
    }


    public function tour_book(Request $request)
    {

        Order::book_tour($request);
        Alert::toast('Đặt Tour thành công','success');

        return redirect()->route('tour.list');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('frontend.ChangeInfo.index')->with(compact('users'));
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         "name" => 'required|max:30',
    //         "email" => 'required|max:50',
    //         "address" => 'required',
    //         "phone" => 'required|max:10',
    //     ], [
    //             "name.required" => 'Tên phải có ',
    //             "phone.required" => 'Số điện thoại phải có ',
    //             "address.required" => 'Địa chỉ phải có',
    //             "email.required" => 'Email phải có',
    //             "email.max" => 'Email không được vượt quá :max ký tự',
    //         ]);

    //     $user = User::find($id);
    //     $user->name = $data["name"];
    //     $user->address = $data["address"];
    //     $user->phone = $data["phone"];

    //     if ($user->email !== $data["email"]) {
    //         $data->validate([
    //             "email" => 'unique:users',
    //         ], [
    //                 "email.unique" => 'Email đã tồn tại',
    //             ]);
    //         $user->email = $data["email"];
    //     }

    //     $user->save();

    //     return redirect()->back()->with("status", "Cập nhật thông tin thành công");

    // }

}
