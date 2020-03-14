@extends('layout')

@section('content')

@foreach($all_products as $product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{URL :: to($product -> product_image)}}" width = "200px" height = "280px">
                <h2>{{ $product -> product_price }} Tk.</h2>
                <p>{{ $product -> product_name }}</p>
                <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                <img src="{{URL :: to($product -> product_image)}}" width = "200px" height = "280px">
                    <h2>{{ $product -> product_price }} Tk.</h2>
                    <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}"><p>{{ $product -> product_name }}</p></a>
                    <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="{{ URL :: to('/view-product/'. $product -> product_id) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="{{ URL :: to('/view-product/'. $product -> product_id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
            </ul>
        </div>
    </div>
</div>
 
 @endforeach
</div>
<!--features_items-->
@endsection