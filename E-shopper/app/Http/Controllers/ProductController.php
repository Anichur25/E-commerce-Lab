<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use Redirect;


class ProductController extends Controller
{
    public function add_product()
    {
        $categories = DB :: table('categories')
        ->where('publication_status',1)
        ->get();
       return view('admin.add_product') -> with('categories',$categories);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request -> product_name;
        $data['category_id'] = $request -> category_id;
        $data['manufacture_id'] = $request -> manufacture_id;
        $data['product_short_description'] = $request -> product_short_description;
        $data['product_long_description'] = $request -> product_long_description;
        $data['product_price'] = $request -> product_price;
        $data['product_size'] = $request -> product_size;
        $data['product_color'] = $request -> product_color;
        $data['publication_status'] = $request -> publication_status;
        
        $image = $request ->file('product_image');

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['product_image'] = $image_url;
                DB :: table('products')->insert($data);
                Session :: put('message','Product added successfully');
                return Redirect :: to('/add-product');
            }
        }
         
        $data['product_image'] = '';
            DB :: table('products')->insert($data);
            Session :: put('message','Product added successfully');
            return Redirect :: to('/add-product');
    }

    public function all_products()
    {
        $all_products = DB :: table('products')
                        ->join('categories','products.category_id','=','categories.category_id')
                        ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                        ->select('products.*','categories.category_name','manufactures.manufacture_name')
                        ->get();
        return view('admin.all_products') -> with('all_products_info',$all_products);
    }

    public function unactive_product($product_id)
    {
        DB :: table('products')
        ->where('product_id',$product_id)
        ->update(['publication_status' => 0]);
        Session :: put('message','product deactived successfully');
        return Redirect :: to('/all-products');
    }

    public function active_product($product_id)
    {
        DB :: table('products')
        ->where('product_id',$product_id)
        ->update(['publication_status' => 1]);
        Session :: put('message','product actived successfully');
        return Redirect :: to('/all-products');
    }

    public function delete_product($product_id)
    {
        DB :: table('products')
        ->where('product_id',$product_id)
        ->delete();
        Session :: put('message','product deleted successfully');
        return Redirect :: to('/all-products');
    }

    public function edit_product($product_id)
    {
        $result = DB :: table('products')
                       ->where('product_id',$product_id)
                       ->first();

        $product_info = DB :: table('products')
                       ->join('categories','categories.category_id','=','products.category_id')
                       ->join('manufactures','manufactures.manufacture_id','=','products.manufacture_id')
                       ->where('categories.category_id',$result -> category_id)
                       ->where('manufactures.manufacture_id',$result -> manufacture_id)
                       ->where('products.product_id',$product_id)
                       ->select('products.*','categories.category_name','manufactures.manufacture_name')
                       ->first();
                        
        return view('admin.edit_product')->with('product_info',$product_info);

    }
}
