<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

session_start();
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.add_category');
    }

    public function all_category()
    {
       $all_category_info =  DB :: table('categories')->get();
        
       return view('admin.all_category')
        ->with('all_category_info',$all_category_info);
        
    }

    public function save_category(Request  $request)
    {
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['category_description'] = $request -> category_description;
        $data['publication_status'] = $request -> publication_status;

        DB :: table('categories')->insert($data);
        Session :: put('message','Category added successfully !!');
        return Redirect :: to('/add-category');
    }
}
