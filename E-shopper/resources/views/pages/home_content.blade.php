
@extends('layout')

@section('content')

@foreach($all_products as $product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{URL :: to($product -> product_image)}}" width = "200px" height = "280px">
                <h2>{{ $product -> product_price }}Tk.</h2>
                <p>{{ $product -> product_name }}</p>
                <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                <img src="{{URL :: to($product -> product_image)}}" width = "200px" height = "280px" alt="" />
                    <h2>{{ $product -> product_price }}Tk.</h2>
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

<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
          <?php $category_info = DB :: table('categories')
                                ->where('publication_status',1)
                                ->limit(4)
                                ->get();
                $cnt = 0;
          ?>
            @foreach($category_info as $category_each)
             <?php ++$cnt; ?>
             @if($cnt == 1)
            <li class = "active"><a href="#{{ $category_each -> category_name }}" data-toggle="tab">{{ $category_each -> category_name }}</a></li>
            @else
            <li><a href="#{{ $category_each -> category_name }}" data-toggle="tab">{{ $category_each -> category_name }}</a></li>
            @endif 
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
       <?php $cnt = 0;
        $category_info = DB :: table('categories')
           ->where('publication_status',1)
           ->limit(4)
           ->get();
       ?>

       @foreach($category_info as $category_each)
        <?php ++$cnt;
              $products = DB :: table('products')
                              ->where('category_id',$category_each -> category_id)
                              ->where('publication_status',1)
                              ->limit(4)
                              ->get();
        ?>
        @if($cnt == 1)
        <div class="tab-pane fade active in" id="{{ $category_each -> category_name }}">
            @foreach($products as $product)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL :: to($product -> product_image)}}">
                            <h2>{{ $product -> product_price }}Tk.</h2>
                            <p>{{ $product -> product_name }}</p>
                            <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="tab-pane fade" id="{{ $category_each -> category_name }}">
          @foreach($products as $product)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL :: to($product -> product_image)}}">
                            <h2>{{ $product -> product_price }}Tk.</h2>
                            <p>{{ $product -> product_name }}</p>
                            <a href="{{ URL :: to('/view-product/'. $product -> product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach 
    </div>
</div>
<!--/category-tab-->


@endsection