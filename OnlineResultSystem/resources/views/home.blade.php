<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Online Result System</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('dashfiles/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashfiles/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('dashfiles/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('dashfiles/css/style-responsive.css')}}" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext'
        rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel = "stylesheet" href = "{{ asset('css/style.css') }}">




</head>

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse"
                    data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">

                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i>
                                {{Session :: get('user_id')}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL :: to('/logout')}}"><i class="halflings-icon off"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="{{URL :: to('/dashboard')}}"><span class="hidden-tablet">
                                    Home</span></a></li>
                        @if(Session :: get('user_id'))
                        <li>
                            <a class="dropmenu" href="#"><span class="hidden-tablet">Student</span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL :: to('/add-student')}}"><span
                                            class="hidden-tablet">Add Student</span></a></li>
                                <li><a class="submenu" href="{{URL :: to('/view-students')}}"><span
                                            class="hidden-tablet">View Student</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><span class="hidden-tablet">Syllabus</span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL :: to('/add-product')}}"><span
                                            class="hidden-tablet">Add Course</span></a></li>
                                <li><a class="submenu" href="{{URL :: to('/all-products')}}"><span
                                            class="hidden-tablet">Add Syllabus</span></a></li>
                                <li><a class="submenu" href="{{URL :: to('/all-products')}}"><span
                                            class="hidden-tablet">View Syllabus</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><span class="hidden-tablet">Form Fill Up</span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL :: to('/add-product')}}"><span
                                            class="hidden-tablet">Regular/Irregular</span></a></li>
                                <li><a class="submenu" href="{{URL :: to('/all-products')}}"><span
                                            class="hidden-tablet">Improve</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><span class="hidden-tablet">Examination</span></a>
                            <ul>
                                <li><a class="submenu" href="{{URL :: to('/add-product')}}"><span
                                            class="hidden-tablet">Regular/Irregular</span></a></li>
                                <li><a class="submenu" href="{{URL :: to('/all-products')}}"><span
                                            class="hidden-tablet">Improve</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><span class="hidden-tablet">Result</span></a>
                        </li>
                        @endif

                        <li><a href="{{URL :: to('/all-category')}}"><span
                                    class="hidden-tablet">
                                    About</span></a></li>
                        <li><a href="{{URL :: to('/add-category')}}"><span
                                    class="hidden-tablet">Contact Us</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end: Main Menu -->


            <div id="content" class="span10">
                @yield('contents')
                @if(Session :: get('user_id') == NULL)
                  @include('login')
                @endif 

            </div>
            <!--/.fluid-container-->

            <!-- end: Content -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->

    <div class="clearfix"></div>

    <footer>

    </footer>

    <!-- start: JavaScript-->

    <script src="{{asset('dashfiles/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery-migrate-1.0.0.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.ui.touch-punch.js')}}"></script>
    <script src="{{asset('dashfiles/js/modernizr.js')}}"></script>
    <script src="{{asset('dashfiles/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('dashfiles/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/excanvas.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.flot.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.chosen.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.uniform.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.cleditor.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.noty.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.elfinder.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.raty.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.iphone.toggle.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.uploadify-3.1.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.gritter.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.imagesloaded.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.masonry.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.knob.modified.js')}}"></script>
    <script src="{{asset('dashfiles/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('dashfiles/js/counter.js')}}"></script>
    <script src="{{asset('dashfiles/js/retina.js')}}"></script>
    <script src="{{asset('dashfiles/js/custom.js')}}"></script>
    <!-- end: JavaScript-->

</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->

</html>