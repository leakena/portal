<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <link rel="stylesheet" href="{{url('portals/assets/css/pages/page_log_reg_v2.css')}}">
    @include('frontend.layouts.includes.head')
    @yield('after-style-end')
</head>

<body>
<!--=== Content Part ===-->
<div class="container">
    <!--Reg Block-->
    @yield('content')
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
@include('frontend.layouts.includes.js.link_js')
<script type="text/javascript" src="{{url('portals/assets/plugins/backstretch/jquery.backstretch.min.js')}}"></script>
<script type="text/javascript">
    $.backstretch([
        "portals/assets/img/bg/itc.jpg",
//        "portals/assets/img/bg/18.jpg",
        "portals/assets/img/bg/itc1.jpg",
    ], {
        fade: 1000,
        duration: 7000
    });
</script>

@yield('after-script-end')
</body>
</html>
