<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSpot extends Model
{
    use HasFactory;
    public static $data;

    public static function save_spot($request)
    {
        self::$data = new TouristSpot();
        self::$data->location_id = $request->location_id;
        self::$data->spot_name = $request->spot_name;
        self::$data->save();
    }

    public static function update_spot($request)
    {
        self::$data = TouristSpot::find($request->id);
        self::$data->location_id = $request->location_id;
        self::$data->spot_name = $request->spot_name;
        self::$data->save();
    }
}
