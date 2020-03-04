 @extends('home')
 @section('contents')
 @if(Session :: get('message-save'))
 <p class = 'alert alert-success'>{{ Session :: get('message-save') }}</p>
 <?php Session :: put('message-save',NULL)?>
 @endif
 <div class="student_info_container">
     <div class="student_info_items">
         <form action = "{{ url('/save-student') }}" method = "post">
             {{ csrf_field() }}
             <div class="row">
                 <div class="col-md-6"><h3 class = "text-center heading">Student Information</h3></div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Student ID</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_id"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Name</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_name"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Father's Name</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_father_name"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Mother's Name</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_mother_name"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Date Of Birth</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_dob"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Hall</strong></label>
                 </div>
                 <div class="col-md-9">
                     <div class="form-group">
                         <select class="student_info_item" name="hall_name">
                             @foreach($halls as $hall)
                             <option value="{{ $hall -> hall_name }}">{{ $hall -> hall_name }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Session</strong></label>
                 </div>
                 <div class="col-md-1">
                     <div class="form-group">
                         <select class="student_info_item" name="session">
                             @foreach($sess as $session)
                             <option value="{{ $session -> session_year  }}">{{ $session -> session_year }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Gender</strong></label>
                 </div>
                 <div class="col-md-2">
                     <div class="form-group">
                         <select class="student_info_item" name="gender">
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                             <option value="Other">Other</option>
                         </select>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label><strong>Address</strong></label>
                 </div>
                 <div class="col-md-2">
                     <div class="form-group">
                         <textarea class="student_info_item" rows="3" cols = "9" name = "address"></textarea>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Email</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="email" class="student_info_item" name="student_email"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Contact Number</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="student_mobile_number"
                             style="background-color: gainsboro;">
                     </div>
                 </div>
             </div>
             <button type="submit" class="btn btn-primary">Save</button>
         </form>
     </div>

 </div>

 @endsection