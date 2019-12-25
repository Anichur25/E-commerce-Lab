<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = DB :: table('categories')
                      ->where('publication_status',1)
                      ->get();
        return view('pages.home_content')->with('categories',$categories);
    }
}
