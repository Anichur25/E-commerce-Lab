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

        $all_products = DB :: table('products')
                      ->join('categories','products.category_id','=','categories.category_id')
                      ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                      ->where('products.publication_status',1)
                      ->select('products.*','categories.category_name','manufactures.manufacture_name')
                      ->limit(9)
                      ->get();

        return view('pages.home_content',['categories' => $categories,'all_products' => $all_products]);
    }
}
