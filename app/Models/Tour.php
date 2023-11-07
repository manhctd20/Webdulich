<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;
    public $timestamps = false;

    public static function save_tour($request)
    {
        self::$data = new Tour();
        self::$data->name = $request->name;
        self::$data->location_id = $request->location_id;
        self::$data->duration = $request->duration;
        self::$data->price = $request->price;
        self::$data->image = self::saveImage($request);
        self::$data->description = $request->input('description');
        self::$data->save();
    }
    public static function update_tour($request)
    {
        self::$data = Tour::find($request->id);
        self::$data->name = $request->name;
        self::$data->location_id = $request->location_id;
        self::$data->duration = $request->duration;
        self::$data->price = $request->price;
        self::$data->description = $request->input('description');
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
        self::$imageName = 'tour-'.rand().'.'. self::$image->Extension();
        self::$directory = 'tour/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    public function search($query)
    {
        return $this->where('name', 'like', "%$query%")
                    // ->orWhere('description', 'like', "%$query%")
                    ->get();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function showTour($id)
    {
        $tour = tour::with('reviews')->find($id);
        return view('frontend.tour.tour-details', compact('tours'));
    }
}
