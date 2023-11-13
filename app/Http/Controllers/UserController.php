<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $users = User::get();

        return view('admin.user.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('frontend.ChangeInfo.index')->with(compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => 'required|max:30',
            "email" => 'required|max:50',
            "address" => 'required',
            "phone" => 'required|max:10',
        ], [
                "name.required" => 'Tên phải có ',
                "phone.required" => 'Số điện thoại phải có ',
                "address.required" => 'Địa chỉ phải có',
                "email.required" => 'Email phải có',
                "email.max" => 'Email không được vượt quá :max ký tự',
            ]);

        $user = User::find($id);
        $user->name = $data["name"];
        $user->address = $data["address"];
        $user->phone = $data["phone"];

        if ($user->email !== $data["email"]) {
            $data->validate([
                "email" => 'unique:users',
            ], [
                    "email.unique" => 'Email đã tồn tại',
                ]);
            $user->email = $data["email"];
        }

        $user->save();

        return redirect()->back()->with("status", "Cập nhật thông tin thành công");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_user(Request $request)
    {
        User::find($request->id)->delete();
        Alert::toast('User deleted successfully','success');
        return redirect()->route('manage.users');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|min:8',
        ]);

        $user = Auth::user(); // Lấy thông tin người dùng đã xác thực

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($data['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác']);
        }
        if ($data['new_password'] !== $data['new_password_confirmation']) {
            return redirect()->back()->withErrors(['new_password_confirmation' => 'Xác nhận mật khẩu không khớp']);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($data['new_password']);
        $user->save();


        return redirect()->back()->with('status', 'Mật khẩu được cập nhật thành công');
    }

}
