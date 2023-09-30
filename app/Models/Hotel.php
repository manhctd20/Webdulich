<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_hotel($request)
    {
        self::$data = new Hotel();
        self::$data->hotel_name = $request->hotel_name;
        self::$data->number_of_room = $request->number_of_room;
        self::$data->room_price = $request->room_price;
        self::$data->location_id = $request->location_id;
        self::$data->description = $request->description;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_hotel($request)
    {
        self::$data = Hotel::find($request->id);
        self::$data->hotel_name = $request->hotel_name;
        self::$data->number_of_room = $request->number_of_room;
        self::$data->room_price = $request->room_price;
        self::$data->location_id = $request->location_id;
        self::$data->description = $request->description;
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
        self::$imageName = 'hotel-'.rand().'.'. self::$image->Extension();
        self::$directory = 'hotels/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
