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

Route :: get('/show-place/{spot_id}','Place@show_place');

Route :: get('/admin','AdminController@index');
Route :: get('/add-new-spot','SpotController@index');
Route :: get('/add-nearest-spot','SpotController@add_nearest_spot');
Route :: post('/save-new-spot','SpotController@save_new_spot');
Route :: post('/save-nearest-spot','SpotController@save_nearest_spot');
Route :: get('/add-nearest-restaurant','SpotController@add_nearest_restaurant');
Route :: post('/save-nearest-restaurant','SpotController@save_nearest_restaurant');
Route :: get('/add-new-slider-content','SpotController@add_new_slider_content');
Route :: post('/save-slider-content','SpotController@save_slider_content');
Route :: get('/add-spot-video','SpotController@add_spot_video');
Route :: post('/save-spot-video','SpotController@save_spot_video');
Route :: get('/virtual-tour','SpotController@virtual_tour');
