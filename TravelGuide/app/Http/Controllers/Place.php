<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class Place extends Controller
{
    public function show_place($spot_id)
    {
       
        Session :: put('virtual_tour','active');
        $places = DB :: table('spots_list')
                 ->join('nearest_spots','spots_list.spot_id','=','nearest_spots.spot_id')
                  ->where('spots_list.spot_id',$spot_id)
                  ->get();

        $restaurants = DB :: table('spots_list')
                  ->join('nearest_restaurants','spots_list.spot_id','=','nearest_restaurants.spot_id')
                   ->where('spots_list.spot_id',$spot_id)
                   ->get();

        $place_images = DB :: table('spots_list')
                      ->join('spot_images','spots_list.spot_id','=','spot_images.spot_id')
                      ->where('spots_list.spot_id',$spot_id)
                      ->get();
        $place_videos = DB :: table('spots_list')
                        ->join('spot_videos','spots_list.spot_id','=','spot_videos.spot_id')
                        ->where('spots_list.spot_id',$spot_id)
                        ->get();              

        return view('place',['nearest_places' => $places,'nearest_restaurants' => $restaurants,'images' => $place_images,'videos' => $place_videos]);
    }
}
