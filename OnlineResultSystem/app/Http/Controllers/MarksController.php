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
        Session :: put('course_credit',$course_type -> course_credit);
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
         $student = DB :: table('students')
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
              ->first();
        if($student == NULL)
        return Redirect :: to ('/view-all-marks');

        return view('add_new_student_mark',['student' => $student]);
    }

    public function save_student_mark(Request $request)
    {
        $student = array();
        $student_obtained_marks = 0.0;
        $studentId = Session :: get('student_id');
        $student['student_id'] = $studentId;
        $student['part'] = Session :: get('part');
        $student['semester'] = Session :: get('semester');
        $student['exam_year'] = Session :: get('exam_year');
        $student['course_code'] = Session :: get('course_code');
        $student['course_credit'] = Session :: get('course_credit');
        $course_type =  Session :: get('course_type');

        if($course_type == 'Written')
        {
            $written_exam_mark = floatval($request -> written_exam_mark);
            $class_test_mark = floatval($request -> class_test_mark);
            $attendence_mark = floatval($request -> attendence_mark);
            $student['written_exam_mark'] = $written_exam_mark;
            $student['class_test_mark'] = $class_test_mark;
            $student['attendence_mark_written'] = $attendence_mark;

            $student_obtained_marks += $written_exam_mark;
            $student_obtained_marks += $class_test_mark;
            $student_obtained_marks += $attendence_mark;
        }
        else if($course_type == 'Lab')
        {
            $practical_exam_mark = floatval($request -> practical_exam_mark);
            $attendence_mark = floatval($request -> attendence_mark);
            $viva_mark = floatval($request -> viva_mark);

            $student['practical_exam_mark'] = $practical_exam_mark;
            $student['attendence_mark_lab'] = $attendence_mark;
            $student['viva_mark_lab'] = $viva_mark;

            $student_obtained_marks += $practical_exam_mark;
            $student_obtained_marks += $attendence_mark;
            $student_obtained_marks += $viva_mark;
        }
        else if($course_type == 'Project')
        {
            $internal_mark = floatval($request -> internal_mark);
            $external_mark = floatval($request -> external_mark);
            $presentation_mark = floatval($request -> presentation_mark);
            $student['internal_mark'] = $internal_mark;
            $student['external_mark'] = $external_mark;
            $student['presentation_mark'] = $presentation_mark;
            
            $student_obtained_marks += $internal_mark;
            $student_obtained_marks += $external_mark;
            $student_obtained_marks += $presentation_mark;
        }
        else 
        {
            $total_viva = floatval($request -> total_viva);
            $student['total_viva'] = $total_viva;
            $student_obtained_marks += $total_viva;
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
        $student['grade_point'] = $grade_point;
        $student['cg'] = $grade_point *  Session :: get('course_credit');
        
        DB :: table('marksheets') -> insert($student);
        DB :: table('enrolled_courses')
             ->where('student_id',$studentId)
             ->where('course_code', Session :: get('course_code'))
             ->where('exam_year',Session :: get('exam_year'))
             ->update(['status' => 'C']);
        return Redirect :: to('/add-new-student-mark');
    }

    public function view_all_marks()
    {
        $all_results = DB :: table('marksheets') -> get();
        return view('view_marks',['all_results_info' => $all_results]);
    }
}
