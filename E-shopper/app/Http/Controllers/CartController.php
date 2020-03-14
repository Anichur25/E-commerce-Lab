<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Redirect;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        Session :: put('hasSidebar','no');
        Session :: put('hasSlider','no');
        $qty = $request -> qty;
        $product_id = $request -> product_id;

        $product_info = DB :: table('products')
                           ->where('product_id',$product_id)
                           ->first();
       
         $data['quantity'] = $qty;
         $data['id'] = $product_id;
         $data['name'] = $product_info -> product_name;
         $data['price'] = $product_info -> product_price;
         $data['attributes']['image'] = $product_info -> product_image;
         
         Cart :: add($data);
         return Redirect :: to('/show-cart');
        
    }

    public function show_cart()
    {
        Session :: put('hasSidebar','no');
        Session :: put('hasSlider','no');
         $categories = DB :: table('categories')
                          ->where('publication_status',1)
                          ->get();
        $cart_content = Cart :: getContent();

        return view('pages.add_to_cart',['categories' => $categories,'cart_content' => $cart_content]); 
    }

    public function delete_cart_item($item_id)
    {
        Cart :: remove($item_id);
       return  Redirect :: to('/show-cart');
    }

    public function update_cart(Request $request)
    {
        $id = $request -> item_id;
        $qty = $request -> quantity;
        $product_info = DB :: table('products')
                     ->where('product_id',$id)
                     ->first();

        $data['quantity'] = $qty;
        $data['id'] = $id;
        $data['name'] = $product_info -> product_name;
        $data['price'] = $product_info -> product_price;
        $data['attributes']['image'] = $product_info -> product_image;
        Cart :: remove($id);
        Cart :: add($data);
        if(Session :: get('shipping_id') == NULL)
        return Redirect :: to('/show-cart');
        else 
        return Redirect :: to('/payment');
    }
}
