<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Str;
use Redirect;

class SliderController extends Controller
{
    public function add_slider()
    {
        return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
        $data = array();
        $data['publication_status'] = $request -> publication_status;
        $data['shop_id'] = Session :: get('shop_id');
        
        $image = $request ->file('slider_image');

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['slider_image'] = $image_url;
                DB :: table('slider')->insert($data);
                return Redirect :: to('/add-slider');
            }
        }
         
        $data['slider_image'] = '';
            DB :: table('slider')->insert($data);
            return Redirect :: to('/add-slider');
    }

    public function all_slider()
    {
        $all_slider = DB :: table('slider')
                       ->where('shop_id',Session :: get('shop_id')) 
                        -> get();
        return view('admin.all_slider',['all_slider' => $all_slider]);
    }

    public function unactive_slider($slider_id)
    {
        DB :: table('slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status' => 0]);
        return Redirect :: to('/all-slider');
    }

    public function active_slider($slider_id)
    {
        DB :: table('slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status' => 1]);
        return Redirect :: to('/all-slider');
    }
    public function delete_slider($slider_id)
    {
        DB :: table('slider')
        ->where('slider_id',$slider_id)
        ->delete();
        return Redirect :: to('/all-slider');
    }

}
