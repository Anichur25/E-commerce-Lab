<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Str;

class SpotController extends Controller
{
    public function index()
    {
        return view('add_new_spot');
    }

    public function save_new_spot(Request $request)
    {
        $new_spot = array();
        $new_spot['spot_name'] = $request -> spot_name;
        $new_spot['spot_latitude'] = doubleval($request -> spot_latitude);
        $new_spot['spot_longitude'] = doubleval($request -> spot_longitude);
        
        DB :: table('spots_list') -> insert($new_spot);
        Session :: put('message','Record save successfully!!!');
        return Redirect :: to('/add-new-spot');
    }

    public function add_nearest_spot()
    {
       $all_spots = DB :: table('spots_list') -> get();
       return view('add_nearest_spot') -> with('all_spots',$all_spots);
    }

    public function save_nearest_spot(Request $request)
    {
        $nearest_spot = array();
        $nearest_spot['place_name'] = $request -> spot_name;
        $nearest_spot['latitude'] = doubleval($request -> spot_latitude);
        $nearest_spot['longitude'] = doubleval($request -> spot_longitude);
        $nearest_spot['spot_id'] = $request -> ref_spot;
        
        DB :: table('nearest_spots') -> insert($nearest_spot);
        Session :: put('message','Record save successfully!!!');
        return Redirect :: to('/add-nearest-spot');
    }
   
    public function add_nearest_restaurant()
    {
       $all_spots = DB :: table('spots_list') -> get();
       return view('add_nearest_restaurant') -> with('all_spots',$all_spots);
    }

    public function save_nearest_restaurant(Request $request)
    {
        $nearest_restaurant = array();
        $nearest_restaurant['restaurant_name'] = $request -> restaurant_name;
        $nearest_restaurant['latitude'] = doubleval($request -> restaurant_latitude);
        $nearest_restaurant['longitude'] = doubleval($request -> restaurant_longitude);
        $nearest_restaurant['spot_id'] = $request -> ref_spot;
        
        DB :: table('nearest_restaurants') -> insert($nearest_restaurant);
        Session :: put('message','Record save successfully!!!');
        return Redirect :: to('/add-nearest-restaurant');
    }

    public function add_new_slider_content()
    {
        $all_spots = DB :: table('spots_list') -> get();
        return view('add_slider_content') -> with('all_spots',$all_spots);
    }

    public function save_slider_content(Request $request)
    {
        $slider_content = array();
        $slider_content['place_name'] = $request -> place_name;
        $slider_content['spot_id'] = $request -> ref_spot;
        $image = $request ->file('spot_image');

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'slider_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $slider_content['image_link'] = $image_url;
                DB :: table('spot_images')->insert($slider_content);
                Session :: put('message','Record save successfully!!!');
                return Redirect :: to('/add-new-slider-content');
            }
        }
    }

    public function add_spot_video()
    {
        $all_spots = DB :: table('spots_list') -> get();
        return view('add_spot_videos') -> with('all_spots',$all_spots);
    }

    public function save_spot_video(Request $request)
    {
        $video = array();
        $video['video_link'] = $request -> video_link;
        $video['spot_id'] = $request -> ref_spot;
        
        DB :: table('spot_videos') -> insert($video);
        Session :: put('message','Record save successfully!!!');
        return Redirect :: to('/add-spot-video');
    }

    public function virtual_tour($spot_id)
    {
        $tour_content = DB :: table('spots_list')
                        ->join('virtual_tour','virtual_tour.spot_id','=','spots_list.spot_id')
                        ->where('spots_list.spot_id',$spot_id)
                        ->first();
        return Redirect :: to($tour_content -> tour_image);
    }

    public function add_virtual_tour()
    {
        return view('add_virtual_tour');
    }

    public function save_virtual_tour(Request $request)
    {
        $tour_content = array();
        $tour_content['spot_id'] = $request -> ref_spot;
        $link= $request ->file('spot_virtual_tour_link');
        $tour_content['tour_image'] = $request -> spot_virtual_tour_link;
          DB :: table('virtual_tour')->insert($tour_content);
                Session :: put('message','Record save successfully!!!');
                return Redirect :: to('/add-spot-virtual-tour');     
        
    }

}
