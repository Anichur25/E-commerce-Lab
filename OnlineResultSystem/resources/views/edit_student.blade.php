@extends('home')
 @section('contents')

 <div class="student_info_container">
     <div class="student_info_items">
         <form action = "{{ url('/update-student') }}" method = "post">
             {{ csrf_field() }}
             <input type = "hidden" name = "id" value = "{{ $student -> id }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_id }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_name }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_father_name }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_mother_name }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_dob }}">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Hall</strong></label>
                 </div>
                 <div class="col-md-9">
                     <div class="form-group">
                         <select class="student_info_item" name="hall_name" value = "{{ $student -> hall }}">
                            <option value = "{{ $student -> hall }}"> {{ $student -> hall }}</option>
                             @foreach($halls as $hall)
                             @if($student -> hall != $hall -> hall_name)
                             <option value="{{ $hall -> hall_name }}">{{ $hall -> hall_name }}</option>
                             @endif
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
                         <select class="student_info_item" name="session" value = "{{ $student -> session }}">
                         <option value = "{{ $student -> session }}"> {{ $student -> session }}</option>
                             @foreach($sess as $session)
                             @if($student -> session != $session -> session_year)
                             <option value="{{ $session -> session_year  }}">{{ $session -> session_year }}</option>
                             @endif 
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
                         <select class="student_info_item" name="gender" value = "{{ $student -> gender }}">
                             <option value = "{{ $student -> gender }}">{{ $student -> gender }}</option>
                             @if($student -> gender != "Male")
                             <option value="Male">Male</option>
                             @endif
                             @if($student -> gender != "Female")
                             <option value="Female">Female</option>
                             @endif
                             @if($student -> gender != "Other")
                             <option value="Other">Other</option>
                             @endif
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
                         <textarea class="student_info_item" rows="3" cols = "9" name = "address">{{ $student -> address }}</textarea>
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_email }}">
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
                             style="background-color: gainsboro;" value = "{{ $student -> student_mobile_number }}">
                     </div>
                 </div>
             </div>
             <button type="submit" class="btn btn-primary">Update</button>
         </form>
     </div>

 </div>

 @endsection