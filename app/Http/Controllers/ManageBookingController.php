<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ManageBookingController extends Controller
{

    public function manage_tour_booking()
    {
        return view('user.tour-booking.manage-tour-booking',[
            'orders'=>DB::table('orders')
                ->join('users','orders.user_id','users.id')
                ->join('tours','orders.tour_id','tours.id')
                ->select('orders.*','users.name as users_name','tours.name as tours_name')
                ->where('orders.user_id',Auth::user()->id)
                ->get(),
        ]);
    }
    public function edit_tour_booking($id)
    {
        $order = Order::find($id);

        return view('user.tour-booking.edit-tour-booking',[
           'locations'=>Location::get(),
            'order' =>$order,
            'tours'=>DB::table('tours')
                ->join('locations','tours.location_id','locations.id')
                ->select('tours.*','locations.name')
                ->where('tours.id',$order->tour_id)
                ->first(),
        ]);
    }


    public function update_tour_booking(Request $request)
    {

        Order::update_tour_booking($request);
        Alert::toast('Cập nhật order tour thành công','success');

        return redirect()->route('manage.tour.booking');
    }

    // public function delete_guide_booking(Request $request)
    // {
    //     $guide = Order::find($request->id);
    //     if($guide->image){
    //         unlink($guide->image);
    //     }
    //     $guide->delete();
    //     Alert::toast('Đơn hàng đã bị hủy', 'warning');

    //     return back();
    // }

    public function cancelBooking($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->status = '2'; // Thay đổi trạng thái
            $order->save(); // Lưu cập nhật

            return back()->with('success', 'Đơn hàng đã được hủy.');
        } else {
            return back()->with('error', 'Không tìm thấy đơn hàng.');
        }
    }

}
