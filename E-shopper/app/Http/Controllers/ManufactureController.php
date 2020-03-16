<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class ManufactureController extends Controller
{
    public function add_manufacture()
    {
        return view('admin.add_manufacture');
    }

    public function save_manufacture(Request $request)
    {
        $data = array();
        $data['manufacture_name'] = $request -> manufacture_name;
        $data['manufacture_description'] = $request -> manufacture_description;
        $data['publication_status'] = $request -> publication_status;
        $data['shop_id'] = Session :: get('shop_id');
        
        DB :: table('manufactures')->insert($data);
        Session :: put('save_message','manufacture saved successfully !!');
        return Redirect :: to('/add-manufacture');
    }

    public function all_manufacture()
    {
        $all_manufacture = DB :: table('manufactures')
                       ->where('shop_id',Session :: get('shop_id')) 
                       -> get();
        return view('admin.all_manufacture') -> with('all_manufacture_info',$all_manufacture);
    }
    
    public function unactive_manufacture($manufacture_id)
    {
        
        DB :: table('manufactures')
           ->where('manufacture_id',$manufacture_id)
           ->update(['publication_status'=>0]);
        return Redirect :: to('/all-manufacture');
    }

    public function active_manufacture($manufacture_id)
    {
        DB :: table('manufactures')
           ->where('manufacture_id',$manufacture_id)
           ->update(['publication_status'=>1]);
        return Redirect :: to('/all-manufacture');
    }
    
    public function delete_manufacture($manufacture_id)
    {
        DB :: table('manufactures')
         ->where('manufacture_id',$manufacture_id)
         ->delete();
         return Redirect :: to('all-manufacture');
    }

    public function edit_manufacture($manufacture_id)
    {
        $manufacture_info = DB :: table('manufactures')
              ->where('manufacture_id',$manufacture_id)
              ->first();

        return view('admin.edit_manufacture')->with('manufacture_info',$manufacture_info);
    }

    public function update_manufacture(Request $request,$manufacture_id)
    {
        DB :: table('manufactures')
        ->where('manufacture_id',$manufacture_id)
        ->update(['manufacture_name'=>$request->manufacture_name,'manufacture_description'=>$request->manufacture_description]);
        return Redirect :: to('/all-manufacture');
    }
}
