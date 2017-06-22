{{--<!-- JS Global Compulsory -->--}}



{!! Html::script('portals/assets/plugins/jquery/jquery.min.js') !!}


{!! Html::script('bower_components/form.validation/dist/js/formValidation.js') !!}
{!! Html::script('bower_components/form.validation/dist/js/framework/bootstrap.js') !!}
{!! Html::script('portals/assets/plugins/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('portals/assets/plugins/jquery/jquery-migrate.min.js') !!}

{{--<!-- JS Implementing Plugins -->--}}

{!! Html::script('portals/assets/plugins/back-to-top.js') !!}
{{--{!! Html::script('portals/assets/plugins/smoothScroll.js') !!}--}}
{!! Html::script('portals/assets/plugins/counter/waypoints.min.js'  ) !!}
{!! Html::script('portals/assets/plugins/counter/jquery.counterup.min.js') !!}
{!! Html::script('portals/assets/plugins/circles-master/circles.js') !!}
{!! Html::script('portals/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js') !!}
{!! Html::script('portals/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js') !!}

{{--<!-- JS Customization -->--}}
{!! Html::script('portals/assets/js/custom.js') !!}
{{--<!-- JS Page Level -->--}}

{!! Html::script('portals/assets/js/app.js') !!}
{!! Html::script('portals/assets/js/plugins/datepicker.js') !!}
{!! Html::script('portals/assets/js/plugins/circles-master.js') !!}
{!! Html::script('portals/assets/js/plugins/style-switcher.js') !!}
{!! Html::script('bower_components/bootstrap-sweetalert/dist/sweetalert.js') !!}
{!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
{!! Html::script('bower_components/select2/dist/js/select2.js') !!}

{!! Html::script('portals/js/validate_field.js') !!}
{{--toastr js--}}
{!! Html::script('bower_components/toastr/toastr.js') !!}



<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
        App.initCounter();
        App.initScrollBar();
        Datepicker.initDatepicker();
        CirclesMaster.initCirclesMaster1();
        StyleSwitcher.initStyleSwitcher();

    });

    function notify(type, title, description) {
        toastr[type](description, title);
    }

    $(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    })
</script>
<!--[if lt IE 9]>
{!! Html::script('portals/assets/plugins/respond.js') !!}
{!! Html::script('portals/assets/plugins/html5shiv.js') !!}
{!! Html::script('portals/assets/plugins/placeholder-IE-fixes.js') !!}
{!! Html::script('portals/assets/plugins/jquery/jquery.min.js') !!}
{!! Html::script('portals/assets/plugins/bootstrap/js/bootstrap.min.js') !!}
<![endif]-->