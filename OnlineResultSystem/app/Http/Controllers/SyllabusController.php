<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class SyllabusController extends Controller
{
    public function add_syllabus()
    {
        $courses = DB :: table('courses') -> get();
        $session = DB :: table('sessions') -> get();
        return view('add_syllabus',['courses' => $courses,'sessions' => $session]);
    }

    public function save_syllabus(Request $request)
    {
        $courses = $request -> courses;
        $syllabus['syllabus_name'] = $request -> syllabus_title;
        $syllabus['session_id'] = $request -> session;
        $syllabus['semester'] = $request -> semester;
        $syllabus['year'] = $request -> year;
        $syllabus_id = DB :: table('syllabuses') -> insertGetId($syllabus);

        foreach($courses as $course)
        {
            $course_info['syllabus_id'] = $syllabus_id;
            $course_info['course_id'] = $course;
            DB :: table('syllabus_wise_subjects') -> insert($course_info);
        }

        return Redirect :: to('/view-syllabuses');

    }

    public function view_syllabuses()
    {
        $all_syllabuses_info = DB :: table('syllabuses') -> get();
        return view('all_syllabuses',['all_syllabuses_info' => $all_syllabuses_info]);
    }

    public function syllabus_detail($syllabus_id)
    {
        $syllabus = DB :: table('syllabuses')
                   ->join('syllabus_wise_subjects','syllabuses.syllabus_id','=','syllabus_wise_subjects.syllabus_id')
                   ->join('courses','courses.course_id','=','syllabus_wise_subjects.course_id')
                   ->where('syllabuses.syllabus_id',$syllabus_id)
                   ->select('syllabuses.*','courses.course_code','courses.course_title','courses.course_credit')
                   ->get();
       return view('individual_syllabus',['syllabus' => $syllabus]);
    }

    public function delete_syllabus($syllabus_id)
    {
        DB :: table('syllabuses')
              ->where('syllabus_id',$syllabus_id)
              ->delete();
        DB :: table('syllabus_wise_subjects')
             ->where('syllabus_id',$syllabus_id)
             ->delete();
         return Redirect :: to('/view-syllabuses');
    }
}
