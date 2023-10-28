<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\TouristSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Review; // Đảm bảo bạn đã import mô hình Review
class GuideController extends Controller
{

    public function postReview(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You need to be logged in to post a review.');
        }

        // Lấy dữ liệu từ biểu mẫu và xác thực nó
        $data = $request->validate([
            'guide_id' => 'required',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|max:255',
        ]);

        // Lưu đánh giá vào cơ sở dữ liệu
        Review::create([
            'user_id' => Auth::user()->id,
            'guide_id' => $data['guide_id'],
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);

        return redirect()->back()->with('success', 'Review posted successfully.');
    }

    //
    public function add_guide()
    {
        return view('admin.guide.add-guide',[
            'locations'=>Location::get(),
        ]);
    }

    public function get_spot($id)
    {
        $spot = TouristSpot::where('location_id', $id)->get();
        return response()->json($spot);
    }

    public function save_guide(Request $request)
    {
        Guide::save_guide($request);
        Alert::toast('Tour Guide added successfully');
        return back();
    }

    public function manage_guide()
    {

        return view('admin.guide.manage-guide',[
            'spots'=>TouristSpot::get(),
            'guides'=>DB::table('guides')
                ->join('locations','guides.location_id','locations.id')
                ->select('guides.*','locations.location_name')
                ->get(),
        ]);
    }

    public function edit_guide($id)
    {
        $guide_data = Guide::find($id);
        return view('admin.guide.edit-guide',[
            'locations'=>Location::get(),
            'spots'=>TouristSpot::where('location_id',$guide_data->location_id)->get(),
            'guide'=>Guide::find($id),
        ]);
    }

    public function update_guide(Request $request)
    {
        Guide::update_guide($request);
        Alert::toast('Tourist Guide Updated Successfully');

        return back();
    }

    public function delete_guide(Request $request)
    {
        $guide = Guide::find($request->id);
        if($guide->image){
            unlink($guide->image);
        }
        $guide->delete();
        Alert::toast('Guide deleted successfully');

        return back();
    }
}
