<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert ;

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
        return view('changeInfo')->with(compact('users'));
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

}
