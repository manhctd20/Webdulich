<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAirTicket extends Model
{
    use HasFactory;
    public static $data;
    public static function book_ticket($request)
    {
        self::$data = new BookAirTicket();
        self::$data->user_id = $request->user_id;
        self::$data->ticket_id = $request->ticket_id;
        self::$data->date = $request->date;
        self::$data->sit_type = $request->sit_type;
        self::$data->payment_price = $request->payment_price;
        self::$data->save();
    }

    public static function update_ticket_booking($request)
    {
        self::$data = BookAirTicket::find($request->id);
        self::$data->user_id = $request->user_id;
        self::$data->ticket_id = $request->ticket_id;
        self::$data->date = $request->date;
        self::$data->sit_type = $request->sit_type;
        self::$data->payment_price = $request->payment_price;
        self::$data->save();
    }
}
