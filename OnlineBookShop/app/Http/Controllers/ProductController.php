<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Str;
use Session;
class ProductController extends Controller
{
    public function add_product()
    {
        $categories = DB :: table('categories') -> get();
        return view('admin.add_product') -> with('categories',$categories);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['book_name'] = $request -> book_name;
        $data['book_author'] = $request -> book_author;
        $data['book_price'] = $request -> book_price;
        $data['book_description'] = $request -> book_description;
        $data['category_id'] = $request -> category_id;
        $image = $request ->file('book_image');

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'bookImage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['book_image'] = $image_url;
                DB :: table('products')->insert($data);
                Session :: put('save_message','Product saved successfully!!!');
                return Redirect :: to('/add-product');
            }
        }
         
        $data['product_image'] = '';
            DB :: table('products')->insert($data);
            Session :: put('save_message','Product saved successfully!!!');
        return Redirect :: to('/admin/add-product');
    }

    public function all_products()
    {
        $all_books = DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->select('products.*','categories.category_name')
                     ->get();
        return view('admin.all_products') -> with('all_books',$all_books);
    }

    public function delete_product($book_id)
    {
         DB :: table('products')
             ->where('book_id',$book_id)
             ->delete();
        Session :: put('save_message','Product deleted successfully!!!');
        return Redirect :: to('/admin/all-products');
    }

    public function edit_product($book_id)
    {
        $book_info = DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->select('products.*','categories.category_name')
                     ->where('book_id',$book_id)
                     ->first();

        $categories = DB :: table('categories') -> get();

        return view('admin.edit_product',['book_info' => $book_info,'categories' => $categories]);
    }

    public function update_product(Request $request,$book_id)
    {
        $data = array();
        $data['book_name'] = $request -> book_name;
        $data['book_author'] = $request -> book_author;
        $data['book_price'] = $request -> book_price;
        $data['book_description'] = $request -> book_description;
        $data['category_id'] = $request -> category_id;
        $image = $request ->file('book_image');
        
        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'bookImage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['book_image'] = $image_url;
                DB :: table('products')
                ->where('book_id',$book_id)
                ->update($data);
                Session :: put('save_message','Product updated successfully!!!');
                return Redirect :: to('/admin/all-products');
            }
        }
        else
        {
            DB :: table('products')
            ->where('book_id',$book_id)
            ->update($data);
            Session :: put('save_message','Product updated successfully!!!');
            return Redirect :: to('/admin/all-products');
        }
        
    }
}