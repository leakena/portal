<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    @yield('before-style-end')
    @include('frontend.layouts.includes.head')

    <style>
        .ui-datepicker-inline {
            border: 0px !important;
        }
    </style>
    @yield('after-style-end')
</head>

<body>
<div class="wrapper">
    <!--=== Header ===-->
    @include('frontend.layouts.includes.header')
    <!--=== End Header ===-->

    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            @include('frontend.layouts.includes.left_sidebar')
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <!--Service Block v3-->
                    <!--End Service Block v3-->
                    @yield('content')

                    <!-- End Table Search v2 -->
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    @include('frontend.layouts.includes.footer')
    <!--=== End Footer Version 1 ===-->
</div><!--/wrapper-->

<!--=== Style Switcher ===-->
    @include('frontend.layouts.includes.switcher')
<!--/style-switcher-->
<!--=== End Style Switcher ===-->
@yield('before-script-end')
@include('frontend.layouts.includes.js.link_js')
@yield('after-script-end')

</body>
</html>
