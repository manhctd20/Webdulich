<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_guide($request)
    {
        self::$data = new Guide();
        self::$data->guide_name = $request->guide_name;
        self::$data->phone_number = $request->phone_number;
        self::$data->salary = $request->salary;
        self::$data->location_id = $request->location_id;
        self::$data->spot_id = json_encode($request->spot_id);
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_guide($request)
    {
        self::$data = Guide::find($request->id);
        self::$data->guide_name = $request->guide_name;
        self::$data->salary = $request->salary;
        self::$data->phone_number = $request->phone_number;
        self::$data->location_id = $request->location_id;
        self::$data->spot_id = json_encode($request->spot_id);
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
        self::$imageName = 'guide-'.rand().'.'. self::$image->Extension();
        self::$directory = 'guide/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
