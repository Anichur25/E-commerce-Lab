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
        <a href="#">Edit product</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

        </div>
        <p class="alert-success">
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
            <form class="form-horizontal" method="POST" action="{{url('/update-product')}}" enctype = "multipart/form-data">
                {{csrf_field()}}
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" value = "{{ $product_info -> product_name}}"class="input-xlarge" name="product_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Product category</label>
                        <div class="controls">
                            <select id="selectError3" name = "category_id">
                                <option value = "{{ $product_info -> category_id }}"> {{ $product_info -> category_name }}</option>
                                
                                <?php
                                  $categories = DB :: table('categories')
                                                    ->where('publication_status',1)
                                                    ->distinct()
                                                    ->get();
                                  foreach($categories as $category){?>
                                       <option value = "{{ $category -> category_id }}"> {{ $category -> category_name }}</option>
                                  <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Manufacture name</label>
                        <div class="controls">
                            <select id="selectError3" name = "manufacture_id">
                            <option value = "{{ $product_info -> manufacture_id }}"> {{ $product_info -> manufacture_name }}</option>
                                <?php
                                  $all_manufacture = DB :: table('manufactures')
                                                    ->where('publication_status',1)
                                                    ->get();
                                                    
                                                
                                  foreach($all_manufacture as $manufacture){?>
                                       <option value = "{{ $manufacture -> manufacture_id }}"> {{ $manufacture -> manufacture_name }}</option>
                                  <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product short description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_short_description" rows="2" required>
                              {{ $product_info -> product_short_description }}
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product long description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_long_description" rows="2" required>
                               {{ $product_info -> product_long_description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_price" value = "{{ $product_info -> product_price }}"required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Product image</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name = "product_image" id="fileInput" type="file" value = "{{ $product_info -> product_image }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Size</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_size" value = "{{ $product_info -> product_size }}"required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Color</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_color" value = "{{ $product_info -> product_color }}" required>
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update product</button>
                       
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->
@endsection