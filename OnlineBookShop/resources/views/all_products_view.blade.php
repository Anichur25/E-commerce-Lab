@extends('header')
<link href="{{URL ::to('productStyle/product-style.css')}}" rel="stylesheet">
@section('body')

<div class="container">

    <br>
    <h2>Available Products</h2>
    <br>
    <div class="row justify-content-end">
        <div class="col-md-2 col-sm-6">
            <div class="dropdown">
                <button type="button"class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                    Sort By(Asce)
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ URL :: to('/products-by-name-asc') }}">Name</a>
                    <a class="dropdown-item" href="{{ URL :: to('/products-by-price-asc') }}">Price</a>
                </div>
            </div>

        </div>
        <div class="col-md-2 col-sm-6">
            <div class="dropdown">
                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                    Sort By(desc)
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ URL :: to('/products-by-name-desc') }}">Name</a>
                    <a class="dropdown-item" href="{{ URL :: to('/products-by-price-desc') }}">Price</a>

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" src="{{ $product -> book_image }}">
                        <img class="pic-2" src="{{ $product -> book_image }}">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>

                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{ $product -> book_name }}</a></h3>
                    <h3 class="title">{{ $product -> book_author }}</h3>
                    <div class="price">
                        <p>Tk. {{ $product -> book_price }}</p>
                    </div>
                    <a class="add-to-cart" href="">ADD TO CART</a>
                    <a class = "btn btn-info" href = "">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
        <br>
    </div>

    {{ $products -> links('vendor.pagination.bootstrap-4') }}
</div>
@endsection