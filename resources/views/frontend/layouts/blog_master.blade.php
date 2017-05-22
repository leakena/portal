<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>


@yield('before-style-end')

@include('frontend.layouts.includes.head')
<!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('portals/assets/css/pages/blog.css')}}">

    @yield('after-style-end')

</head>

<body>
<div class="wrapper">
    <!--=== Header ===-->
@include('frontend.layouts.includes.header')
<!--=== End Header ===-->

    <!--=== Breadcrumbs ===-->
{{--<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">Blog Medium</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Features</a></li>
            <li class="active">Blog Medium</li>
        </ul>
    </div>
</div><!--/breadcrumbs-->--}}
<!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">

                {{--section content post --}}
                @yield('content')
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
        @include('frontend.layouts.includes.blog.right_sidebar')

        <!-- End Right Sidebar -->
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

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
