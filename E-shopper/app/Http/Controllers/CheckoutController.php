<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use Cart;

class CheckoutController extends Controller
{
    public function login_check()
    {
        Session :: put('hasSlider','no');
        return view('pages.login');
    }

    public function customer_registration(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request -> name;
        $data['customer_email'] = $request -> email;
        $data['customer_password'] = $request -> password;
        $data['mobile_number'] = $request -> mobile_number;
        $customer_id = DB :: table('customers') -> insertGetId($data);
        Session :: put('user_id',$customer_id);
        Session :: put('user_name',$request -> name);
        return Redirect :: to('/checkout');
    }

    public function checkout()
    {
        Session :: put('hasSlider','no');
        if(Session :: get('user_id') && Session :: get('shipping_id') == NULL)
        return view('pages.checkout');
        else if(Session :: get('user_id') && Session :: get('shipping_id'))
         return Redirect :: to('/payment');
        else 
         return Redirect :: to('/login-check');
    }

    public function save_shipping_details(Request $request)
    {
       $data = array();
       $data['shipping_email'] = $request -> shipping_email;
       $data['shipping_first_name'] = $request -> shipping_first_name;
       $data['shipping_last_name'] = $request -> shipping_last_name;
       $data['shipping_address'] = $request -> shipping_address;
       $data['shipping_mobile_number'] = $request -> shipping_mobile_number;
       $data['shipping_city'] = $request -> shipping_city;
       
       $shipping_id = DB :: table('shippings')
                          ->insertGetId($data);
        Session :: put('shipping_id',$shipping_id);
        return Redirect :: to('/payment');
    }

    public function payment()
    {
        Session :: put('hasSlider','no');
        return view('pages.payment');
    }

    public function payment_gateway(Request $request)
    {
        $data = array();
        $data['payment_method'] = $request -> payment_gateway;
        $data['payment_status'] = "pending";
        $payment_id = DB :: table('payments')->insertGetId($data);

       $order = array();
       $order['customer_id'] = Session :: get('user_id');
       $order['shipping_id'] = Session :: get('shipping_id');
       $order['payment_id'] = $payment_id;
       $order['order_total'] = Cart :: getTotal();
       $order['order_status'] = "pending";
       $order_id = DB :: table('orders') -> insertGetId($order);
       
       $order_detail = array();
       $cart_contents = Cart :: getContent();

       foreach($cart_contents as $content)
       {
           $order_detail['order_id'] = $order_id;
           $order_detail['product_id'] = $content -> id;
           $order_detail['product_name'] = $content -> name;
           $order_detail['product_price'] = $content -> price;
           $order_detail['product_sales_quantity'] = $content -> quantity;

           DB :: table('order_details') -> insert($order_detail);
       }

       if($request -> payment_gateway == "handcash")
       {
           Cart :: clear();
           Session :: put('shipping_id',NULL);
           return Redirect :: to('/handcash');
       }
    }

    public function handcash()
    {
        return view('pages.handcash');
    }

    public function manage_order()
    {
        $all_order_info = DB :: table('orders')
                         ->join('customers','customers.customer_id','=','orders.customer_id')
                         ->select('orders.*','customers.customer_name')
                         ->get();
        return view('admin.manage_order')->with('orders',$all_order_info);
    }

    public function view_order($order_id)
    {
        $order_info_by_id = DB :: table('orders')
                        ->join('customers','orders.customer_id','=','customers.customer_id')
                        ->join('order_details','orders.order_id','=','order_details.order_id')
                        ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
                        ->select('orders.*','order_details.*','shippings.*','customers.*')
                        ->where('orders.order_id',$order_id)
                        ->get();
           
               
        return view('admin.view_order',['order_info' => $order_info_by_id]);
    }
}
