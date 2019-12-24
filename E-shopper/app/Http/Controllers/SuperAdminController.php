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
}
