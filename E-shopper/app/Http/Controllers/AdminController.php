<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Redirect;
use Session;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        if(Session :: get('admin_id'))
         return Redirect :: to('/dashboard');
        return view('admin.admin_login');
    }

   

    public function dashboard(Request $request)
    {
        $admin_email = $request -> admin_email;
        $admin_password = ($request -> admin_password);
        $result = DB :: table('admins')
                  ->where('admin_email',$admin_email)
                  ->where('admin_password',$admin_password)
                  ->first();
          
                  if($result)
                  {
                    Session :: put('admin_name',$result -> admin_name);
                    Session :: put('admin_id',$result -> admin_id);
                    return Redirect :: to('/dashboard');
                  }
                  else
                  {
                     Session :: put('message','Email or Password Invalid');
                     return Redirect :: to('/login');
                  }
    }
}
