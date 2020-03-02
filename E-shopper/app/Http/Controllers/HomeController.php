<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        Session :: put('hasSlider',null);
        Session :: put('showFeatureItem','yes');
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
        $all_slider = DB :: table('slider')
                     ->where('publication_status',1)
                     ->get();

        return view('pages.home_content',['categories' => $categories,'all_products' => $all_products,'all_slider' => $all_slider]);
    }

    public function show_products_category_wise($category_id)
    {
        Session :: put('hasSlider','no');
        Session :: put('showFeatureItem','yes');
        $all_products = DB :: table('products')
                        ->join('categories','products.category_id','=','categories.category_id')
                        ->where('products.category_id',$category_id)
                        ->where('products.publication_status',1)
                        ->limit(10)
                        ->get();
        $all_slider = DB :: table('slider')
                     ->where('publication_status',1)
                     ->get();
        $categories = DB :: table('categories')
                      ->where('publication_status',1)
                      ->get();
        return view('pages.category_wise_products',['all_products' => $all_products,'all_slider' => $all_slider,'categories' => $categories]);
    }

    public function show_products_manufacture_wise($manufacture_id)
    {
        Session :: put('hasSlider','no');
        Session :: put('showFeatureItem','yes');
        $all_products = DB :: table('products')
        ->join('manufactures','manufactures.manufacture_id','=','products.manufacture_id')
        ->where('products.manufacture_id',$manufacture_id)
        ->where('products.publication_status',1)
        ->limit(10)
        ->get();

        $all_slider = DB :: table('slider')
                     ->where('publication_status',1)
                     ->get();

        $categories = DB :: table('categories')
                     ->where('publication_status',1)
                     ->get();

        return view('pages.manufacture_wise_products',['all_products' => $all_products,'all_slider' => $all_slider,'categories' => $categories]);
    }

    public function product_details_by_id($product_id)
    {
        Session :: put('hasSlider','no');
        Session :: put('showFeatureItem',null);
        $product = DB :: table('products')
                      ->join('categories','products.category_id','=','categories.category_id')
                      ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                      ->where('products.product_id',$product_id)
                      ->select('products.*','categories.category_name','manufactures.manufacture_name')
                      ->first();

        $all_slider = DB :: table('slider')
                      ->where('publication_status',1)
                      ->get();
 
         $categories = DB :: table('categories')
                      ->where('publication_status',1)
                      ->get();

        return view('pages.product_details',['product' => $product,'categories' => $categories]);
    }
}
