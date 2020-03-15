<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{URL :: to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{URL :: to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{URL :: to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
        href="{{URL :: to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL :: to('/') }}"><img src="{{URL :: to('frontend/images/home/logo.png')}}"
                                    alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               @if(Session :: get('user_name') == NULL)
                                <li class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-lock"></i>
                                        SignUp
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL :: to('/admin-signup')}}"><i class="halflings-icon off"></i>
                                                As Admin</a></li>
                                        <li><a href="{{URL :: to('/user-signup')}}"><i class="halflings-icon off"></i>
                                                As User</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-lock"></i>
                                        Login
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL :: to('/admin-login')}}"><i class="halflings-icon off"></i>
                                                As Admin</a></li>
                                        <li><a href="{{URL :: to('/user-login')}}"><i class="halflings-icon off"></i>
                                                As User</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ URL :: to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                @endif 
                                @if(Session :: get('user_name') != NULL)
                                <li class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="halflings-icon white user"></i>
                                        {{Session :: get('user_name')}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(Session :: get('user_type') != NULL && Session :: get('user_type') != 'U')
                                        <li><a href="{{URL :: to('/dashboard')}}"><i class="halflings-icon off"></i>
                                                Admin Panel</a></li>
                                        @endif
                                        <li><a href="{{URL :: to('/logout')}}"><i class="halflings-icon off"></i>
                                                Logout</a></li>
                                    </ul>
                                </li>
                                 @endif
                                @if(Session :: get('user_type') != 'A' &&  Session :: get('user_type') != 'S')
                                <li><a href="{{ URL :: to('/checkout') }}"><i class="fa fa-crosshairs"></i>
                                        Checkout</a></li>
                                <li><a href="{{ URL :: to('/show-cart')}}">Cart</a></li>
                               @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL :: to('/') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ URL :: to('/') }}">Products</a></li>
                                        @if(Session :: get('user_name'))
                                        <li><a href="{{ URL :: to('/checkout') }}">Checkout</a></li>
                                        @else
                                        <li><a href="{{ URL :: to('/login-check') }}">Checkout</a></li>
                                        @endif
                                        <li><a href="{{ URL :: to('/show-cart')}}">Cart</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="search_box pull-right">
                            <form action="{{ url('/search_by_keyword') }}" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="keyword">
                                <span><button class="btn btn-primary">Search</button></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    @if(Session :: get('hasSlider') == 'yes')
    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach( $all_slider as $slider )
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            @foreach( $all_slider as $slider )
                            <div class="item {{ $loop->first ? ' active' : '' }}">
                                <img src="{{ $slider->slider_image }}" style="width: 300px; height: 300px;">
                            </div>
                            @endforeach
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif
    <!--/slider-->

    @if(Session :: get('hasSidebar') == 'yes')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach($categories as $category)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                            href="{{URL :: to('/show_category_products/'.$category -> category_id)}}">{{ $category->category_name }}</a>
                                    </h4>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php 
									$manufactures = DB :: table('manufactures')
									->where('publication_status',1)
									->get();
									foreach($manufactures as $manufacture){
										  $items = DB :: table('manufactures')
													->where('manufacture_name',$manufacture->manufacture_name)
													->count();
										?>
                                    <li><a href="{{('/show_manufacture_products/'.$manufacture -> manufacture_id)}}">
                                            <span
                                                class="pull-right">({{ $items }})</span>{{ $manufacture -> manufacture_name }}</a>
                                    </li>
                                    <?php }?>



                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        @if(Session ::get('showFeatureItem'))
                        <h2 class="title text-center">Features Items</h2>
                        @endif
                        @yield('content');

                    </div>
                </div>
            </div>
    </section>
    @else
    @yield('content')
    @endif

    <footer id="footer">
        <!--Footer-->


        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </footer>
    <!--/Footer-->



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>