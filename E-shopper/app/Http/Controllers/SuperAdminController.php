<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class SuperAdminController extends Controller
{
    public function logout()
    {
        Session :: put('admin_name',null);
        Session :: put('admin_id',null);
       return Redirect :: to('/login');
    }

    public function index()
    {
        $this -> adminAuthCheck();
        return view('admin.dashboard');
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
