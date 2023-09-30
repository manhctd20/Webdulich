<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public static $data;

    public static function save_location($request)
    {
        self::$data = new Location();
        self::$data->location_name = $request->location_name;
        self::$data->save();
    }

    public static function update_location($request)
    {
        self::$data = Location::find($request->id);
        self::$data->location_name = $request->location_name;
        self::$data->save();
    }
}
