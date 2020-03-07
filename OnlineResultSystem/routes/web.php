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

/** student related routes */
Route :: get('/add-student','StudentController@add_student');
Route :: post('/save-student','StudentController@save_student');
Route :: get('/view-students','StudentController@view_students');
Route :: get('/student-detail/{student_id}','StudentController@student_detail');
Route :: get('/edit-student/{student_id}','StudentController@edit_student');
Route :: get('/delete-student/{student_id}','StudentController@delete_student');
Route :: post('/update-student','StudentController@update_student');

/** course related routes */

Route :: get('/add-course','CourseController@add_course');
Route :: post('/save-course','CourseController@save_course');
Route :: get('/view-courses','CourseController@view_courses');
Route :: get('/course-detail/{course_id}','CourseController@course_detail');
Route :: post('/update-course/{course_id}','CourseController@update_course');
Route :: get('/edit-course/{course_id}','CourseController@edit_course');
Route :: get('/delete-course/{course_id}','CourseController@delete_course');

/** syllabus related routes */

Route :: get('/add-syllabus','SyllabusController@add_syllabus');
Route :: post('/save-syllabus','SyllabusController@save_syllabus');
Route :: get('/view-syllabuses','SyllabusController@view_syllabuses');
Route :: get('/syllabus-detail/{syllabus_id}','SyllabusController@syllabus_detail');
Route :: get('/delete-syllabus/{syllabus_id}','SyllabusController@delete_syllabus');

/** Marks related routes */
Route :: get('/add-marks','MarksController@get_academic_info');
Route :: post('/add-marks-info','MarksController@get_info');
Route :: get('/add-new-student-mark','MarksController@add_new_stu_mark');
Route :: post('/save-marks','MarksController@save_student_mark');
Route :: get('/view-all-marks','MarksController@view_all_marks');
