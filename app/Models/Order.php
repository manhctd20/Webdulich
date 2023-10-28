<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static $data;
    public static function book_tour($request)
    {
        self::$data = new Order();
        self::$data->user_id = $request->user_id;
        self::$data->tour_id = $request->tour_id;
        self::$data->fromDate = $request->fromDate;
        self::$data->num_people = $request->num_people;
        self::$data->totalPrice = $request->totalPrice;
        self::$data->address = $request->address;
        self::$data->phone = $request->phone;
        self::$data->status = $request->status;
        self::$data->save();
    }

    public static function update_tour_booking($request)
    {
        self::$data = Order::find($request->id);
        self::$data->user_id = $request->user_id;
        self::$data->tour_id = $request->tour_id;
        self::$data->fromDate = $request->fromDate;
        self::$data->num_people = $request->num_people;
        self::$data->totalPrice = $request->totalPrice;
        self::$data->address = $request->address;
        self::$data->phone = $request->phone;
        self::$data->status = $request->status;
        self::$data->save();
    }
}
