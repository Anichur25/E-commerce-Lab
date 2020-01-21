<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Place extends Controller
{
    public function show_place($place_name)
    {
        $nearest_places = DB :: table('coordinates') -> get();
        $nearest_restaurants = DB :: table('nearest_restaurants') -> get();
        return view('place',['nearest_places' => $nearest_places,'nearest_restaurants' => $nearest_restaurants]);
    }
}
