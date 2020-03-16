<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Cart;
class AuthController extends Controller
{
  
    public function admin_signup()
    {
        Session :: put('hasSlider','no');
        Session :: put('hasSidebar','no');
        return view('admin_signup');
    }
    public function user_signup()
    {
        Session :: put('hasSlider','no');
        Session :: put('hasSidebar','no');
        return view('user_signup');
    }

    public function admin_login()
    {
        Session :: put('hasSlider','no');
        Session :: put('hasSidebar','no');

        return view('admin_login');
    }
    public function user_login()
    {
        Session :: put('hasSlider','no');
        Session :: put('hasSidebar','no');
        return view('user_login');
    }

    public function check_auth_admin(Request $request)
    {
        $result = DB :: table('admins')
                 ->where('admin_email',$request -> email)
                 ->where('admin_password',$request -> password)
                 ->first();
        if($result == NULL)
        {
            Session :: put('invalid_password','Please enter a valid password or email!!');
            return Redirect :: to('/admin-login');
        }
        else
        {
            Session :: put('user_name',$result -> shop_name);
            Session :: put('shop_id',$result -> shop_id);
            if($result -> admin_type == 0)
            Session :: put('user_type','A');
            else Session :: put('user_type','S');
            return Redirect :: to('/dashboard');
        }
    }

    public function check_auth_user(Request $request)
    {
        $result = DB :: table('customers')
                 ->where('customer_email',$request -> email)
                 ->where('customer_password',$request -> password)
                 ->first();
        if($result == NULL)
        {
            Session :: put('invalid_password','Please enter a valid password or email!!');
            return Redirect :: to('/user-login');
        }
        else
        {
            Session :: put('user_name',$result -> customer_name);
            Session :: put('user_type','U');
            $items = Cart :: getContent();
            if($items == NULL)
            return Redirect :: to('/');
            else return Redirect :: to('/checkout');
        }
    }


    public  function admin_info_save(Request $request)
    {
        $data = array();
        $data['shop_name'] = $request -> shop_name;
        $data['admin_email'] = $request -> email;
        $data['admin_password'] = $request -> password;
        $data['admin_phone'] = $request -> mobile_number;
        $code = $request -> code;
        $isValid = DB :: table('secret_codes')
                   ->where('code',$request -> code)
                   ->first();
        if($isValid)
        {
           DB :: table('admins') -> insert($data);
           return Redirect :: to('/admin-login'); 
        }
        
        else
        {
            Session :: put('invalid_token','Please enter a valid secret code!!!');
            return Redirect :: to('/admin-signup');
        } 
    }

    public  function user_info_save(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request -> user_name;
        $data['customer_email'] = $request -> email;
        $data['customer_password'] = $request -> password;
        $data['mobile_number'] = $request -> mobile_number;
        DB :: table('customers') -> insert($data);
        return Redirect :: to('/user-login');
    }
   
   public function logout()
   {
      Session :: flush();
      return Redirect :: to('/');
   }

   public function show_dashboard()
   {
       $user_type = Session :: get('user_type');
       if($user_type == NULL)
     return Redirect :: to('/admin-login') -> send();
     else if($user_type != "U")
     return view('admin.dashboard');
     else 
     return Redirect :: to('/');
   }
   
   public function checkout_login(Request $request)
   {
        $email = $request -> email;
        $password = $request -> password;

       $user = DB :: table('customers')
               ->where('customer_email',$email)
               ->where('customer_password',$password)
               ->first();
        if($user)
        {
            Session :: put('user_id',$user -> customer_id);
            Session :: put('user_name',$user -> customer_name);
            Session :: put('user_type',$user -> user_type);
            return Redirect :: to('/checkout');
        }
        else 
        {
            Session :: put('message','Wrong emali or password');
            return Redirect :: to('/login-check');
        }
   }
}
