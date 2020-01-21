<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

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

}
