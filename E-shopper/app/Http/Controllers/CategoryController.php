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
        $this ->adminAuthCheck();
        return view('admin.add_category');
    }

    public function all_category()
    {
        $this -> adminAuthCheck();
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

    public function unactive_category($category_id)
    {
        
        DB :: table('categories')
           ->where('category_id',$category_id)
           ->update(['publication_status'=>0]);
        return Redirect :: to('/all-category');
    }

    public function active_category($category_id)
    {
        DB :: table('categories')
              ->where('category_id',$category_id)
              ->update(['publication_status'=>1]);
            return Redirect :: to('/all-category');
    }

    public function edit_category($category_id)
    {
        $this ->adminAuthCheck();
        $category_info = DB :: table('categories')
                       ->where('category_id',$category_id)
                       ->first();
        return view('admin.edit_category')
               ->with('category_info',$category_info);
    }

    public function update_category(Request $request,$category_id)
    {
       DB :: table('categories')
        ->where('category_id',$category_id)
        ->update(['category_name' =>$request->category_name,'category_description'=>$request->category_description]);
        return Redirect :: to('/all-category');
    }

    public function delete_category($category_id)
    {
        DB :: table('categories')
        ->where('category_id',$category_id)
        ->delete();
        return Redirect :: to('/all-category');
    }

    public function adminAuthCheck()
    {
        $admin_id = Session :: get('admin_id');

        if($admin_id)
          return;
        else
        {
            return Redirect :: to('/login') -> send();
        }
    }
}
