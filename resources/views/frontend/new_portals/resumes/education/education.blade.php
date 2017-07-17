@extends('frontend.layouts.master_portal')


@section('after-style-end')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
    <style>

        .dl-horizontal dt {
            width: 30px;
        }

        .dl-horizontal dd {
            margin-left: 80px;
        }

        .profile .profile-edit hr {
            margin: 12px 0 8px;
            margin-top: 12px;
            margin-right: 0px;
            margin-bottom: 8px;
            margin-left: 0px;
        }

        .profile .profile-edit {
            padding-bottom: 0px;
        }

        .green {
            color: #00A000 !important;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 28px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }

        .sky-form .icon-append {
            right: 17px;
            padding: 1px 3px;
            min-width: 34px;
        }

        .panel-yellow {
            border-color: #4765a0;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }

        .panel-yellow > .panel-heading {
            background: #4765a0;
            color: white;
        }

        .panel-u > .panel-heading {
            background: #72c02c;
        }

        .each_top_row {
            margin-top: 2px;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }

        .sky-form .icon-append {
            right: 17px;
            padding: 1px 3px;
            min-width: 34px;
        }

        .panel-body {
            padding: 15px !important;
            padding-top: 15px !important;
            padding-right: 15px !important;
            padding-bottom: 15px !important;
            padding-left: 15px !important;
        }
    </style>
@endsection
@section('content')

    <div class="row margin-bottom-20">
        <div class="col-md-12">
            <!-- Yellow Panel -->
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-tasks"></i> Education
                        <a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                           href="#id_form" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-plus-square" id="add"></i>
                        </a>
                    </h3>

                </div>
                <div class="panel-body no-padding">

                    <div id="id_form" class="collapse " aria-expanded="false">
                        <form action="{{ route('frontend.resume.store_education') }}" method="post"
                              enctype="multipart/form-data"
                              class="sky-form form-horizontal form_create_ecducation" novalidate="novalidate">
                            <header style="font-size: 8pt"> Create Your Education</header>

                            <fieldset>
                                @include('frontend.new_portals.resumes.education.partials.create_edit_fields')
                            </fieldset>
                        </form>
                    </div>
                    <div class="education no-padding">
                        @if(count($educations)>0)
                            @foreach($educations as $education)
                                <div class="col-md-6 no-padding" style="border-color: #27d7e7 !important;">
                                    <div class="tag-box-v3 margin-bottom-10 no-padding">
                                        @include('frontend.new_portals.resumes.education.partials.action')
                                        <div id="" class="profile-edit blog_reference tab-pane fade in active">
                                            @include('frontend.new_portals.resumes.education.partials.fields')
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                </div>

            </div>
            <!-- End Yellow Panel -->
        </div>
    </div>

    {{--<div class="profile-bio margin-bottom-30">--}}
    {{--<form action="{{ route('frontend.resume.store_education') }}" method="post" enctype="multipart/form-data"--}}
    {{--class="sky-form form-horizontal form_create_ecducation" novalidate="novalidate">--}}
    {{--<header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"--}}
    {{--href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"--}}
    {{--id="add"> </i> </a> Create Your--}}
    {{--Education--}}
    {{--</header>--}}
    {{--<div id="id_form" class="collapse " aria-expanded="false">--}}
    {{--<fieldset>--}}
    {{--@include('frontend.new_portals.resumes.education.partials.create_edit_fields')--}}
    {{--</fieldset>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}


    {{--<div class="panel panel-profile">--}}
    {{--<div class="panel-body no-padding">--}}
    {{--<div class="row education">--}}
    {{--@if(count($educations)>0)--}}
    {{--@foreach($educations as $education)--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="tag-box tag-box-v3 margin-bottom-40 no-padding">--}}
    {{--@include('frontend.new_portals.resumes.education.partials.action')--}}
    {{--<div id="" class="profile-edit blog_experience tab-pane fade in active">--}}
    {{--@include('frontend.new_portals.resumes.education.partials.fields')--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@else--}}
    {{--There is no education please click on button add to add education--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    @include('frontend.new_portals.resumes.education.partials.modal')

@endsection


@section('after-script-end')


    <script type="text/javascript">


        $('input[name="start_date"]').datepicker({
            format: 'dd-mm-yyyy',
            useCurrent: false
        });

        $('input[name="end_date"]').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });

        $(document).on('click', '.btn_edit_education', function (e) {
            //e.preventDefault();
            var dom = $(this).parent().parent().parent().parent().children().eq(1);
            var selectedDegreeId = dom.find('input[name=hidden_degree_id]').val();

            $('form#form_edit_education select[name=degree] option').each(function (key, option) {
                if ($(option).attr('value') == selectedDegreeId) {
                    $(this).prop('selected', true);
                }
            });

            $('form#form_edit_education input[name=education_id]').val(dom.find('.education_id').val());
            $('form#form_edit_education input[name=school]').val((dom.find('.school').text()).trim());
            $('form#form_edit_education input[name=major]').val((dom.find('.major').text()).trim());
            $('form#form_edit_education input[name=address]').val((dom.find('.address').text()).trim());
            $('form#form_edit_education input[name=start_date]').val(dom.find('.start').val());
            if (dom.find('.is_present').val() == true) {
                $('form#form_edit_education input[class=slider_update]').prop({'checked': true});
                $('form#form_edit_education input[name=end_date]').val('Present').datepicker('destroy').prop('readonly', true);
                $('form#form_edit_education input[name=is_present]').val(1);
            } else {

                $('form#form_edit_education input[class=slider_update]').prop({'checked': false});
                $('form#form_edit_education input[name=end_date]').val(dom.find('.end').val()).datepicker({
                    format: 'dd-mm-yyyy'
                });
            }

        });

        $('.slider_update').on('change', function () {

            if ($(this).is(':checked')) {

                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').prop('readonly', true);
                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').val('Present').datepicker('destroy');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('1');

            } else {

                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').prop('readonly', false).val('').datepicker({
                    format: 'dd-mm-yyyy'
                });
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('0');

            }

        });

        $(document).on('click', '.btn_delete_education', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');
            var dom = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this education?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            method: 'POST',
                            url: var_url,
                            data: {_token: '{{csrf_token()}}'},
                            dataType: 'JSON',
                            success: function (result) {

                                if (result.status == true) {
                                    swal("Deleted!", "Your experience has been deleted.", "success");
                                    dom.parent().parent().parent().parent().parent().remove();
                                }
                                if (result.rest_education <= 0) {
                                    var no_education = '<span class="no_education"> There is no education please click on button add to add education </span>'
                                    $('div.education').append(no_education);

                                }
                            },
                            error: function () {

                            },
                            complete: function () {

                            }
                        })

                    } else {
                        swal("Cancelled", "Your experience is safe :)", "error");
                    }
                });
        });


        validate_education($('.form_create_ecducation'))
        validate_education($('#form_edit_education'))

        function validate_education(object) {

            object.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {

                    school: {
                        validators: {
                            notEmpty: {
                                message: 'Please add your Position!'
                            },
                            stringLength: {
                                min: 3,
                                max: 100,
                                message: 'The school name must be more than 3 and less than 100 characters long'
                            }
                        }
                    },
                    degree: {
                        validators: {
                            notEmpty: {
                                message: 'Please select your degree !'
                            }
                        }
                    },
                    major: {
                        validators: {
                            notEmpty: {
                                message: 'Please add your major or skill!'
                            },
                            stringLength: {
                                min: 5,
                                max: 50,
                                message: 'Your Description must be between 5 to 50 character'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'Please input your Address!'
                            },
                            stringLength: {
                                min: 3,
                                max: 100,
                                message: 'The address must be more than 3 and less than 100 characters long'
                            }
                        }
                    },

                    start_date: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The start date is required'
                            },
                            date: {
                                format: 'DD-MM-YYYY',
                                message: 'The start date is not a valid'
                            },
                            callback: {
                                message: 'The start date must be earlier then the Present',
                                callback: function (value, validator, $field) {

                                    var get_today = new Date();
                                    var selectedDate = validator.getFieldElements('start_date').val();
                                    var split = selectedDate.split('-');
                                    var new_selecteddate = new Date(split[2], split[1] - 1, split[0]);


                                    var check = object.find('input[name=is_present]').val();

                                    if (check == 1) {
                                        object.formValidation('enableFieldValidators', 'end_date', false)
                                        if (new_selecteddate.getTime() > get_today.getTime()) {
                                            return false;
                                        } else {
                                            validator.updateStatus('start_date', validator.STATUS_VALID, 'callback');
                                            validator.updateStatus('end_date', validator.STATUS_VALID, 'callback');
                                            return true;
                                        }
                                    } else {
                                        object.formValidation('enableFieldValidators', 'end_date', true)
                                        return true;
                                    }

                                }
                            }
                        }
                    },

                    end_date: {
                        validators: {
                            enable: false,
                            notEmpty: {
                                message: 'The end date is required'
                            },
                            date: {
                                format: 'DD-MM-YYYY',
                                min: 'start_date',
                                message: 'The start date is not a valid'
                            }

                        }
                    },

                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Please add your description!'
                            },
                            stringLength: {
                                min: 10,
                                max: 200,
                                message: 'Your Description must be between 10 to 200 character'
                            }
                        }
                    }
                }
            }).on('change', 'input[name=start_date]', function (e, data) {

                object.formValidation('revalidateField', 'start_date');

            }).on('change', '[name=end_date]', function (e, data) {

                object.formValidation('enableFieldValidators', 'end_date', true)
                    .formValidation('revalidateField', 'start_date')
                    .formValidation('revalidateField', 'end_date');

            }).on('change', '[name="slider_date"]', function (e) {

                var end_date = object.find('input[name="end_date"]').val(),
                    start_date = object.find('input[name="start_date"]').val(),
                    fv = object.data('formValidation');

                if ($(this).is(':checked')) {
                    fv.enableFieldValidators('end_date', false);
                    fv.revalidateField('start_date');
                } else {
                    fv.enableFieldValidators('end_date', true).revalidateField('end_date');
                    fv.revalidateField('start_date');
                }

            })
        }

    </script>
@endsection