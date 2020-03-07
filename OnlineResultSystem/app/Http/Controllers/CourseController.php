<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class CourseController extends Controller
{
    public function add_course()
    {
        return view('add_course');
    }

    public function save_course(Request $request)
    {
        $course = array();
        $course['course_code'] = $request -> course_code;
        $course['course_title'] = $request -> course_title;
        $course['course_credit'] = $request -> course_credit;
        $course['total_mark'] = floatval($request -> total_mark);
        $course['course_type'] = $request -> course_type;

         DB :: table('courses') -> insert($course);
         return Redirect :: to('/');
    }

    public function view_courses()
    {
        $all_courses_info = DB :: table('courses') -> get();
        return view('view_courses',['all_courses_info' => $all_courses_info]);
    }

    public function course_detail($course_id)
    {
        $course = DB :: table('courses')
                 ->where('course_id',$course_id)
                 ->first();
        return view('individual_course',['course' => $course]);
    }

    public function edit_course($course_id)
    {
        $course = DB :: table('courses')
                  ->where('course_id',$course_id)
                  ->first();
        return view('edit_course',['course' => $course]);
    }

    public function update_course($course_id,Request $request)
    {
        $course = array();
        $course['course_code'] = $request -> course_code;
        $course['course_title'] = $request -> course_title;
        $course['course_credit'] = $request -> course_credit;
        $course['total_mark'] = floatval($request -> total_mark);
        $course['course_type'] = $request -> course_type;
        DB :: table('courses')
            ->where('course_id',$course_id)
             ->update($course);
        return Redirect :: to('/view-courses');
    }

    public function delete_course($course_id)
    {
        DB :: table('courses')
             ->where('course_id',$course_id)
             ->delete();
        return Redirect :: to('/view-courses');
    }
}
