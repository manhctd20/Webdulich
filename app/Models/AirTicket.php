<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirTicket extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_airTicket($request)
    {
        self::$data = new AirTicket();
        self::$data->air_name = $request->air_name;
        self::$data->start_location_id = $request->start_location_id;
        self::$data->destination_location_id = $request->destination_location_id;
        self::$data->economy_sit_number = $request->economy_sit_number;
        self::$data->economy_sit_price = $request->economy_sit_price;
        self::$data->business_sit_number = $request->business_sit_number;
        self::$data->business_sit_price = $request->business_sit_price;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_airTicket($request)
    {
        self::$data = AirTicket::find($request->id);
        self::$data->air_name = $request->air_name;
        self::$data->start_location_id = $request->start_location_id;
        self::$data->destination_location_id = $request->destination_location_id;
        self::$data->economy_sit_number = $request->economy_sit_number;
        self::$data->economy_sit_price = $request->economy_sit_price;
        self::$data->business_sit_number = $request->business_sit_number;
        self::$data->business_sit_price = $request->business_sit_price;
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }

        self::$data->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'airTicket-'.rand().'.'. self::$image->Extension();
        self::$directory = 'air-ticket/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
