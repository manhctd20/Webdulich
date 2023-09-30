<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGuide extends Model
{
    use HasFactory;

    public static $data;
    public static function book_guide($request)
    {
        self::$data = new BookGuide();
        self::$data->user_id = $request->user_id;
        self::$data->guide_id = $request->guide_id;
        self::$data->salary_payment = $request->salary_payment;
        self::$data->date = $request->date;
        self::$data->save();
    }

    public static function update_guide_booking($request)
    {
        self::$data = BookGuide::find($request->id);
        self::$data->user_id = $request->user_id;
        self::$data->guide_id = $request->guide_id;
        self::$data->salary_payment = $request->salary_payment;
        self::$data->date = $request->date;
        self::$data->save();
    }
}
