@extends('admin.admin_layout')
@section('dashboard_content')
<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{ $order_info[0] -> customer_name }}</td>
                    <td>{{ $order_info[0] -> mobile_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{ $order_info[0] -> shipping_first_name }}</td>
                    <td>{{ $order_info[0] -> shipping_address }}</td>
                    <td>{{ $order_info[0] -> shipping_mobile_number }}</td>
                    <td>{{ $order_info[0] -> shipping_email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Product price</th>
                        <th>Product sales quantity</th>
                        <th>Product sub total</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($order_info as $per_order)
                    <tr>
                    <td>{{ $per_order -> product_id }}</td>
                    <td>{{ $per_order -> product_name }}</td>
                    <td>{{ $per_order -> product_price }}</td>
                    <td>{{ $per_order -> product_sales_quantity }}</td>
                    <td>{{ $per_order -> product_sales_quantity * $per_order -> product_price }}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <td colspan = "4"><strong>Total with vat : </strong></td>
                  <td><strong>{{ $order_info[0] -> order_total }} Tk</strong></td>
                  </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection