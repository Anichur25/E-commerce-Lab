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

Route :: get('/','HomeController@index');
/**Authencation routes */
Route :: post('/check-auth','AuthController@check_auth');
Route :: get('/logout','AuthController@logout');

Route :: get('/add-student','StudentController@add_student');
Route :: post('/save-student','StudentController@save_student');
Route :: get('/view-students','StudentController@view_students');
Route :: get('/student-detail/{student_id}','StudentController@student_detail');

