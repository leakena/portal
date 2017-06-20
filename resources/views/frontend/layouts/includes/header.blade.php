<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="index.html" style="height: 80px;">
            <h2>Portal</h2>
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            @include('frontend.layouts.includes.topbar')
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="{{\App\Utils\Http\Facades\ActiveClassManager::areActiveRoutes($homeActiveRoutes)}}">
                    <a href="{{route('frontend.portal.index')}}">
                        Home
                    </a>
                </li>
                <!-- End Home -->

                <!-- Pages -->
            {{--<li class="">
                <a href="#">
                    Pages
                </a>

            </li>--}}
            <!-- End Pages -->

                <!-- Blog -->
                <li class="{{\App\Utils\Http\Facades\ActiveClassManager::areActiveRoutes($blockActiveRoutes)}}">
                    <a href="{{route('frontend.portal.my_post')}}">
                        Blog
                    </a>
                    {{-- <ul class="dropdown-menu">
                         <li><a href="{{route('frontend.portal.my_post')}}">My Posts</a></li>
                         <li><a href="blog_timeline.html">Timelines</a></li>
                     </ul>--}}
                </li>
                <!-- End Blog -->

                <!-- Portfolio -->
                <li class="">
                    <a href="#"> About-us</a>

                </li>
                <!-- End Portfolio -->

                <!-- Search Block -->
            {{--<li>
                <i class="search fa fa-search search-btn"></i>
                <div class="search-open">
                    <div class="input-group animated fadeInDown">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
                                </span>
                    </div>
                </div>
            </li>--}}
            <!-- End Search Block -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->