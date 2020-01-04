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
//admin related routes
Route :: get('/logout','SuperAdminController@logout');
Route :: get('/','HomeController@index');
Route :: get('/login','AdminController@index');
Route :: get('/dashboard','SuperAdminController@index');
Route :: post('/admin-dashboard','AdminController@dashboard');

/** category related routes */

Route :: get('/add-category','CategoryController@index');
Route :: get('/all-category','CategoryController@all_category');
Route :: post('/save-category','CategoryController@save_category');
Route :: get('/unactive-category/{category_id}','CategoryController@unactive_category');
Route :: get('/active-category/{category_id}','CategoryController@active_category');
Route :: get('/edit-category/{category_id}','CategoryController@edit_category');
Route :: post('/update-category/{category_id}','CategoryController@update_category');
Route :: get('/delete-category/{category_id}','CategoryController@delete_category');

/** brand related routes */
Route :: get('/add-manufacture','ManufactureController@add_manufacture');
Route :: post('/save-manufacture','ManufactureController@save_manufacture');
Route :: get('/all-manufacture','ManufactureController@all_manufacture');
Route :: get('/unactive-manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route :: get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route :: get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route :: get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route :: post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');

/** product related routes */

Route :: get('/add-product','ProductController@add_product');
Route :: post('/save-product','ProductController@save_product');
Route :: get('/all-products','ProductController@all_products');
Route :: get('/unactive-product/{product_id}','ProductController@unactive_product');
Route :: get('/active-product/{product_id}','ProductController@active_product');
Route :: get('/delete-product/{product_id}','ProductController@delete_product');
Route :: get('/edit-product/{product_id}','ProductController@edit_product');

/** Slider routes */
Route :: get('/add-slider','SliderController@add_slider');
Route :: post('/save-slider','SliderController@save_slider');
Route :: get('/all-slider','SliderController@all_slider');
Route :: get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route :: get('/active-slider/{slider_id}','SliderController@active_slider');
Route :: get('/delete-slider/{slider_id}','SliderController@delete_slider');

/** category wise show products routes */

Route :: get('/show_category_products/{category_id}','HomeController@show_products_category_wise');
Route :: get('/show_manufacture_products/{manufacture_id}','HomeController@show_products_manufacture_wise');
Route :: get('/view-product/{product_id}','HomeController@product_details_by_id');