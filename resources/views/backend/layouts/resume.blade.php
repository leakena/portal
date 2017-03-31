
<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Portal</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                @include('backend.includes.resumes.profile')
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                @include('backend.includes.resumes.sidebar')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                @include('backend.includes.resumes.sidebar-footer')
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        @include('backend.includes.resumes.navigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('backend.includes.resumes.footer')
        <!-- /footer content -->
    </div>
</div>
    @include('backend.includes.partials.js')
</body>
</html>
