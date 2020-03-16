@extends('admin.admin_layout')
@section('dashboard_content')


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Available Shops</h2>
            
        </div>
        <div class="box-content">
           @if(Session :: get('admin-message'))
           <p class = "alert-danger">{{ Session :: get('admin-message') }}</p>
           <?php Session :: put('admin-message',NULL) ?>
           @endif
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Shop ID</th>
                        <th>Shop Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @foreach($all_shops as $v_shop)
                <tbody>
                    <tr>
                        <td class = "center">{{ $v_shop -> shop_id }}</td>
                        <td class = "center">{{ $v_shop -> shop_name }}</td>
                        <td class="center">{{ $v_shop -> admin_email }}</td>
                        <td class="center">{{ md5($v_shop -> admin_password) }}</td>
                        <td class = "center">{{ $v_shop -> admin_phone }}</td>
                        <td class = "center">
                        <a class="btn btn-danger" href="{{URL :: to('/delete-shop/'.$v_shop -> shop_id)}}">
                                <i class="halflings-icon white trash"></i>
                            </a>
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