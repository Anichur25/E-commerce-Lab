@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
    @if(Session :: get('found_status'))
      <p class = "alert-danger"> {{ Session :: get('found_status') }}</p>
      <?php Session :: put('found_status',NULL) ?>
    @endif 
        <div class="syllabus_info_items">
            <form action="{{ url('/show-individual-result') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Part</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="part" required>
                                <option value=1>Part-I</option>
                                <option value=2>Part-II</option>
                                <option value=3>Part-III</option>
                                <option value=4>Part-IV</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Semester</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="semester" required>
                                <option value="odd">Odd Semester</option>
                                <option value="even">Even Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Examination Year</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="exam_year" required>
                                <?php $years = DB :: table('exam_year') -> get() ?>
                                @foreach($years as $year)
                                <option value="{{ $year -> exam_year }}">{{ $year -> exam_year }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Roll</strong></label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="student_info_item" name="roll"
                                style="background-color: gainsboro;" required>
                        </div>
                    </div>
                </div>
                 <button type = "submit" class = "btn btn-primary">Show result</button>
            </form>
        </div>
    </div>
</div>

@endsection