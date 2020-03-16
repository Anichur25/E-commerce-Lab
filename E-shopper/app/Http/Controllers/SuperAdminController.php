<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class SuperAdminController extends Controller
{
   public function all_categories()
   {
       $all_categories = DB :: table('categories')
                        ->join('admins','categories.shop_id','=','admins.shop_id')
                        ->select('categories.category_id','categories.category_name','categories.publication_status','admins.shop_name')
                        ->get();
       return view('super_admin_view_all_categories',['all_categories' => $all_categories]);
   }

   public function all_manufactures()
   {
        $all_manufactures = DB :: table('manufactures')
                         ->join('admins','manufactures.shop_id','=','admins.shop_id')
                         ->select('manufactures.manufacture_id','manufactures.manufacture_name','manufactures.publication_status','admins.shop_name')
                         ->get();
       return view('super_admin_view_all_manufactures',['all_manufactures' => $all_manufactures]);
   }

   public function all_products_view()
   {
        $all_products = DB :: table('products')
                       ->join('categories','products.category_id','=','categories.category_id')
                       ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                       ->join('admins','products.shop_id','=','admins.shop_id')
                       ->select('products.*','categories.category_name','manufactures.manufacture_name','admins.shop_name')
                       ->get();
         return view('super_admin_view_all_products',['all_products_info' => $all_products]);
   }

   public function all_shops()
   {
       $all_shops = DB :: table('admins')
                    ->where('admin_type',0)
                    ->get();
        return view('super_admin_view_all_shops',['all_shops' => $all_shops]);
   }

   public function delete_shop($shop_id)
   {
          DB :: table('categories')
                ->where('shop_id',$shop_id)
                ->delete();

          DB :: table('manufactures')
                ->where('shop_id',$shop_id)
                ->delete();

          DB :: table('slider')
                ->where('shop_id',$shop_id)
                ->delete();
          
          DB :: table('products')
                ->where('shop_id',$shop_id)
                ->delete();
            
          DB :: table('admins')
                ->where('shop_id',$shop_id)
                ->delete();

        Session :: put('admin-message','Shop deleted successfully!!!');
        return Redirect :: to('/all-shops-view');
   }

   public function all_users()
   {
       $all_users = DB :: table('customers') -> get();
       return view('super_admin_view_all_users',['all_users' => $all_users]);
   }
}