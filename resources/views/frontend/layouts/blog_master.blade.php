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
    <style type="text/css">
        .loading {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .hide {
            display: none !important;
        }

        .loading > .fa, .overlay-wrapper .overlay > .fa {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -15px;
            margin-top: -15px;
            color: #000;
            font-size: 50px;
        }
    </style>
    @yield('after-style-end')

</head>

<body>
<div class="loading">
    <i class="fa fa-refresh fa-spin"></i>
</div>
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

            @include('frontend.layouts.includes.left_sidebar')

            <!-- End Left Sidebar -->

            {{--section content--}}

            <div class="col-md-6 md-margin-bottom-40 post_content">

                {{--section content post --}}
                @yield('content')
            </div>
            {{--end Section content--}}

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
<script type="text/javascript">
    function toggleLoading(isLoading){
        if(isLoading){
            $('.loading').removeClass('hide');
        } else {
            $('.loading').addClass('hide');
        }
    }
    $(document).ready(function(){
        toggleLoading(false);
    });
</script>
@yield('after-script-end')

</body>
</html>
