<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class BookHotel extends Model
{
    use HasFactory;
    public static $data;
    public static function book_hotel($request)
    {
        self::$data = new BookHotel();
        self::$data->checking_in_date = $request->checking_in_date;
        self::$data->checking_out_date = $request->checking_out_date;
        self::$data->user_id = $request->user_id;
        self::$data->hotel_id = $request->hotel_id;
        self::$data->payment_price = $request->payment_price;
        self::$data->save();
    }

    public static function update_hotel_booking($request)
    {
        self::$data = BookHotel::find($request->id);
        self::$data->checking_in_date = $request->checking_in_date;
        self::$data->checking_out_date = $request->checking_out_date;
        self::$data->payment_price = $request->payment_price;
//        self::$data->user_id = Auth::user()->id;
        self::$data->hotel_id = $request->hotel_id;
        self::$data->save();
    }
}
