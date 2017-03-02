<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{--@langRTL--}}
            {{--{{ Html::style(getRtlCss(mix('css/frontend.css'))) }}--}}
        {{--@else--}}
            {{--{{ Html::style(mix('css/frontend.css')) }}--}}
        {{--@endif--}}


        @langRTL
        {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
        {{ Html::style(mix('css/backend.css')) }}
        @endif


        @yield('after-styles')
        {{ Html::style('css/resumecv.css') }}
        {{ Html::style('css/app.css') }}
        {{ Html::style('css/datepicker.css') }}


        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <style>
            body{
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body id="app-layout">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        {{-- Sticky js --}}
        {!! Html::script('js/vendor/jquery.sticky-kit.min.js') !!}
        {!! Html::script('js/vendor/tinymce/js/tinymce/tinymce.min.js') !!}
        {!! Html::script('js/bootstrap-datepicker.js') !!}
        {!! Html::script('js/app.js') !!}

        <script type="text/javascript">
            jQuery(document).ready(function(){
               tinymce.init({
                   selector : '#body_post',
                   menubar:false,
                   statusbar: false
               });

               $("#side-left").stick_in_parent();
               $("#side-right").stick_in_parent();
               $('#start_date').datepicker();
               $('#end_date').datepicker();
               $('#edit_start_date').datepicker();
               $('#edit_end_date').datepicker();
               $('#save-start-date-education').datepicker();
               $('#save-end-date-education').datepicker();
               $('#update-start-date-education').datepicker();
               $('#update-end-date-education').datepicker();

            });
        </script>
        @yield('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>