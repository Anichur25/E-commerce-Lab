@extends('admin.admin_layout')
@section('dashboard_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Edit manufacture</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Manufacture</h2>
           
        </div>
        <p class = "alert-success">
        <?php 
          $message = Session :: get('message');
          
          if($message)
          {
              echo $message;
              Session :: put('message',null);
          }
           
        ?>
        </p>
        <div class="box-content">
            <form class="form-horizontal" method = "POST" action = "{{url('update-manufacture/'.$manufacture_info -> manufacture_id)}}">
            {{csrf_field()}}
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="date01">Manufacture Name</label>
                        <div class="controls">
                            <input type="text" class = "input-xlarge" name = "manufacture_name"  value = "{{ $manufacture_info -> manufacture_name }}" required>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Manufacture description</label>
                        <div class="controls">
                            <textarea class="cleditor" name = "manufacture_description" rows="3"  required>
                            {{ $manufacture_info -> manufacture_description }}
                            </textarea>
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Manufacture</button>
                       
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->
@endsection