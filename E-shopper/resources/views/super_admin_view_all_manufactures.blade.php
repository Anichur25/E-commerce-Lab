@extends('admin.admin_layout')
@section('dashboard_content')


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manufactures</h2>
            
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Manufacture ID</th>
                        <th>Manufacture Name</th>
                        <th>Added By</th>
                        <th>Status</th>
                    </tr>
                </thead>

                @foreach($all_manufactures as $v_manufacture)
                <tbody>
                    <tr>
                        <td class = "center">{{ $v_manufacture -> manufacture_id }}</td>
                        <td class="center">{{ $v_manufacture -> manufacture_name }}</td>
                        <td class="center">{{ $v_manufacture -> shop_name }}</td>
                          <td class = "center">
                             @if($v_manufacture -> publication_status == 1)
                             <span class = "label label-success">Active</span>
                             @else
                               <span class = "label label-danger">Unactive</span>
                            @endif
                          </td>
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->
@endsection