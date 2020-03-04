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
        return view('login');
    }

    public function check_auth(Request $request)
    {
        echo $request -> user_id;
        echo $request -> user_password;
        $user = DB :: table('admins')
                    ->where('user_id',$request -> user_id)
                    ->where('user_password',$request -> user_password)
                    ->first();
        if($user)
        {
           Session :: put('user_id',$user -> user_id);
           return Redirect :: to('/');
        }
        else
        {
            Session :: put('error_message','Wrong user id or password!!!');
            return Redirect :: to('/');
        }
    }

    public function logout()
    {
        Session :: flush();
        return Redirect :: to('/');
    }
}
