<title>@yield('title', app_name())</title>

<!-- Meta -->
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
<meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{url('portals/favicon.ico')}}">

<!-- Web Fonts -->
<link rel="shortcut" type="text/css"
      href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=cyrillic,latin">

<!-- CSS Global Compulsory -->
{{ Html::style('portals/assets/plugins/bootstrap/css/bootstrap.min.css') }}
{{ Html::style('portals/assets/css/style.css') }}
<!-- CSS Header and Footer -->
{{ Html::style('portals/assets/css/headers/header-default.css') }}
{{ Html::style('portals/assets/css/footers/footer-v1.css') }}

<!-- CSS Implementing Plugins -->

{{ Html::style('portals/assets/plugins/animate.css') }}
{{ Html::style('portals/assets/plugins/line-icons-pro/styles.css') }}
{{ Html::style('portals/assets/plugins/line-icons/line-icons.css') }}

{{ Html::style('portals/assets/plugins/font-awesome/css/font-awesome.css') }}


{{ Html::style('portals/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css') }}
{{ Html::style('portals/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css') }}
{{ Html::style('portals/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css') }}

<!-- CSS Page Style -->
{{ Html::style('portals/assets/css/pages/profile.css') }}
{{ Html::style('portals/assets/css/pages/shortcode_timeline2.css') }}


<!-- CSS Theme -->
{{ Html::style('portals/assets/css/theme-colors/default.css') }}
{{ Html::style('portals/assets/css/theme-skins/dark.css') }}

<!-- CSS Customization -->
{{ Html::style('portals/assets/css/custom.css') }}

