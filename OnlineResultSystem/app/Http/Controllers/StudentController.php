<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class StudentController extends Controller
{
    public function add_student()
    {
        $halls = DB :: table('halls') -> get();
        $session = DB :: table('sessions') -> get();
        return view('add_student',['halls' => $halls,'sess' => $session]);
    }

    public function save_student(Request $request)
    {
        $student = array();
        $student['student_id'] = $request -> student_id;
        $student['student_name'] = $request -> student_name;
        $student['student_father_name'] = $request -> student_father_name;
        $student['student_dob'] = $request -> student_dob;
        $student['hall'] = $request -> hall_name;
        $student['session'] = $request -> session;
        $student['gender'] = $request -> gender;
        $student['address'] = $request -> address;
        $student['student_email'] = $request -> student_email;
        $student['student_mobile_number'] = $request -> student_mobile_number;

        DB :: table('students') -> insert($student);
        Session :: put('message-save',"Student's information saved successfully!!!");
        return Redirect :: to('/add-student');
    }

    public function view_students()
    {
        $all_students_info = DB :: table('students') -> get();
        return view('view_students',['all_students_info' => $all_students_info]);
    }

    public function student_detail($student_id)
    {
        
    }
}
