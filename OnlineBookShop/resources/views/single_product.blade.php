@extends('header')
<link href="{{URL ::to('productStyle/single-product.css')}}" rel="stylesheet">
@section('body')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card img">
                <img src="{{ URL :: to($book -> book_image) }}" class="alignment">
            </div>
        </div>
        <div class="col-md-6 align">
            <h4 class="book-name">{{ $book -> book_name }}</h4>
            <h5>by <span class="category">{{ $book -> book_author }}</span></h5>
            <h5>Category : <span class="category">{{ $book -> category_name }}</span></h5>
            <h5>Price : <span class="bolder">Tk. {{ $book -> book_price }}</span></h5>
            <a class="btn btn-outline-success" href="#">Buy Now</a>
            <a class="btn btn-outline-warning" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <h4>Related Books</h4>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($related_items as $item)
                  <div class="col-md-3">
                    <div class="card" style="width: 15rem;">
                        <img src="{{ URL :: to($item -> book_image) }}" class="card-inside">
                        <div class="card-body">
                            <h5>{{ $item -> book_name }}</h5>
                            <h6>{{ $item -> book_author }}</h6>
                            <h6><span class="price">Tk. {{ $item -> book_price }}</span></h6>
                            <a class="btn btn-outline-success" href="{{ URL :: to('/show-product/'.$item -> book_id) }}">View details</a>
                            <a class="btn btn-outline-warning" href=""><i class="fa fa-shopping-cart"></i>Add to
                                Cart</a>
                        </div>
                    </div>
                </div>  
                @endforeach
                
            </div>
        </div>
    </div>

</div>

@endsection