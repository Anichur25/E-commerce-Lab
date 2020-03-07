<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use URL;
class MarksController extends Controller
{
    public function get_academic_info()
    {
        $sessions = DB :: table('sessions') -> get();
        $years = DB :: table('exam_year') -> get();
        $courses = DB :: table('courses') -> get();
        return view('get_info',['sessions' => $sessions,'years' => $years,'courses' => $courses]);
    }

    public function get_info(Request $request)
    {
        Session :: put('part',$request -> part);
        Session :: put('session', $request -> session);
        Session :: put('exam_year', $request -> exam_year);
        Session :: put('semester', $request -> semester);
        Session :: put('course_code',$request -> course_code);
        $course_type = DB :: table('courses')
                      ->where('course_code',$request -> course_code)
                      ->first();
        Session :: put('course_type',$course_type -> course_type);
        Session :: put('course_total_mark',$course_type -> total_mark);
        return Redirect :: to('/add-new-student-mark');
    }

    public function add_new_stu_mark()
    {

        $session = Session :: get('session');
        $part = Session :: get('part');
        $exam_year = Session :: get('exam_year');
        $semester = Session :: get('semester');
        $course_code = Session :: get('course_code');
         $students = DB :: table('students')
              ->join('regular_batch','students.student_id','=','regular_batch.student_id')
              ->join('enrolled_courses','enrolled_courses.student_id','=','students.student_id')
              ->where('regular_batch.session',$session)
              ->where('regular_batch.part',$part)
              ->where('regular_batch.exam_year',$exam_year)
              ->where('regular_batch.semester',$semester)
              ->where('enrolled_courses.course_code',$course_code)
              ->where('enrolled_courses.status','I')
              ->select('students.*')
              ->orderBy('regular_batch.id', 'asc')
              ->simplePaginate(1);
        return view('add_new_student_mark',['students' => $students]);
    }

    public function save_student_mark(Request $request)
    {
        $student = array();
        $student_obtained_marks = 0.0;
        $student['student_id'] = Session :: get('student_id');
        $course_type =  Session :: get('course_type');

        if($course_type == 'Written')
        {
            $student['written_exam_mark'] = $request -> written_exam_mark;
            $student['class_test_mark'] = $request -> class_test_mark;
            $student['attendence_mark'] = $request -> attendence_mark;
            $student_obtained_marks += floatval($request -> written_exam_mark);
            $student_obtained_marks += floatval($request -> class_test_mark);
            $student_obtained_marks += floatval($request -> attendence_mark);
        }
      
        
       $total_mark =  Session :: get('course_total_mark');
       $grade_point;
       $percentage = ($student_obtained_marks * 100.00) / $total_mark;
         if($percentage >= 80.00)
         $grade_point = 4.00;
         else if($percentage >= 75.00)
         $grade_point = 3.75;
         else if($percentage >= 70.00)
         $grade_point = 3.50;
         else if($percentage >= 65.00)
         $grade_point = 3.25;
         else if($percentage >= 60.00)
         $grade_point = 3.00;
         else if($percentage >= 55.00)
         $grade_point = 2.75;
         else if($percentage >= 50.00)
         $grade_point = 2.50;
         else if($percentage >= 45.00)
         $grade_point = 2.25;
         else if($percentage >= 40.00)
         $grade_point = 2.00;
         else
         $grade_point = 0.00;
        echo $grade_point;      
       $page = Session :: get('next_page');
        //return Redirect :: to($page);
    }

    public function faltu()
    {
        return Redirect :: to('/add-student');
    }
}
