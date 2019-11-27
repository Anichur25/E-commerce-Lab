<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;

class EntryController extends Controller
{
   
    public function getValue(Request $req)
    {
         $ID = $req -> input('idnumber');
         $isFound = DB :: select('select student_id from students where student_id = :id',['id' => $ID]);
         $poll_option = '';
        while(true)
        {
            if($req -> input('poll_option') != '')
            {
                $poll_option = $req -> input('poll_option');
            break;
            }
        }
        
        if(count($isFound) == 0 && $poll_option != '')
        {
            DB::insert('insert into students (student_id) values (?)', [$ID]);
            DB ::insert('insert into places (place) values(?)',[$poll_option]);
            $results = DB::select('select student_id from students');
            
        }
        else echo "Already give him/her opinion";  
    }
}
