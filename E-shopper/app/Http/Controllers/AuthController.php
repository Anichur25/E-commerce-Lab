<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class AuthController extends Controller
{
   public function login()
   {
       return view('admin.admin_login');
   }

   public function check_auth(Request $request)
   {
       $email = $request -> email;
       $password = $request -> password;

       $user = DB :: table('customers')
                  ->where('customer_email',$email)
                  ->where('customer_password',$password)
                  ->first();
       if($user)
       {
            Session :: put('user_type',$user -> user_type);
            Session :: put('user_id',$user -> customer_id);
            Session :: put('user_name',$user -> customer_name);

           if($user -> user_type == "A")
               return Redirect :: to('/dashboard');
           else 
              return Redirect :: to('/');
            
          
       }
       else
       {
           Session :: put('message','Wrong user id or password !!!');
           return Redirect :: to('/login');
       }
   }

   public function logout()
   {
      Session :: flush();
      return Redirect :: to('/');
   }

   public function show_dashboard()
   {
       $user_type = Session :: get('user_type');
       if($user_type == null)
     return Redirect :: to('/login') -> send();
     else if($user_type == "A")
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
