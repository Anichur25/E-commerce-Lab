<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function (){
   return view('about');
});

Route :: get('/show-place/{place_name}','Place@show_place');
Route :: get('/admin',function(){
   
    return view('admin_panel');
});

Route :: get('/add-new-spot','SpotController@index');
Route :: get('/add-nearest-spot','SpotController@add_nearest_spot');
Route :: post('/save-new-spot','SpotController@save_new_spot');
Route :: post('/save-nearest-spot','SpotController@save_nearest_spot');
Route :: get('/add-nearest-restaurant','SpotController@add_nearest_restaurant');
Route :: post('/save-nearest-restaurant','SpotController@save_nearest_restaurant');
