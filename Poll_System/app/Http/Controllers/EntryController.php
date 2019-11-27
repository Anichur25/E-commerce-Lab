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
            DB ::insert('insert into students (student_id) values (?)', [$ID]);
            DB ::insert('insert into places (place) values(?)',[$poll_option]);
        }
       
        $output = '';
        $total_row = count(DB :: select('select student_id from students'));
        $php_framework = array("Laravel", "CodeIgniter", "CakePHP", "Phalcon", "Symfony");

        foreach($php_framework as $framework)
        {
           $entries = count(DB :: select('select place from places where place = ?',[$framework]));
           if($entries == 0) continue;
           $percentage = round(($entries/$total_row)*100);
           
           $progress_bar_class = '';
         if($percentage >= 40)
         {
           $progress_bar_class = 'progress-bar-success';
         }
       else if($percentage >= 25 && $percentage < 40)
       {
         $progress_bar_class = 'progress-bar-info';
       }
      else if($percentage >= 10 && $percentage < 25)
       {
         $progress_bar_class = 'progress-bar-warning';
       }
    else
    {
     $progress_bar_class = 'progress-bar-danger';
    }
     
    $output .= '
   <div class="row">
    <div class="col-md-2" align="right">
     <label>'.$framework.'</label>
    </div>
    <div class="col-md-10">
     <div class="progress">
      <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">
       '.$percentage.' % programmer like <b>'.$framework.'</b> PHP Framework
      </div>
     </div>
    </div>
   </div>
  ';
    }

    return $output;
  }
}
