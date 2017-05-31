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

    </style>
@endsection
@section('content')

    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.resume.store_education') }}" method="post" enctype="multipart/form-data"
               class="sky-form form-horizontal form_create_ecducation" novalidate="novalidate">
            <header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                       href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"
                                                                                        id="add"> </i> </a> Create Your
                Education
            </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.education.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>


    <div class="panel panel-profile">
        <div class="panel-body">
            <div class="row education">
                @if(count($educations)>0)
                    @foreach($educations as $education)
                        <div class="col-md-6">
                            <div class="tag-box tag-box-v3 margin-bottom-40 no-padding">
                                @include('frontend.new_portals.resumes.education.partials.action')
                                <div id="" class="profile-edit blog_experience tab-pane fade in active">
                                    @include('frontend.new_portals.resumes.education.partials.fields')
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    There is no education please click on button add to add education
                @endif
            </div>
        </div>
    </div>

    @include('frontend.new_portals.resumes.education.partials.modal')

@endsection


@section('after-script-end')


    <script type="text/javascript">
        //        $(function() {
        //            $('input[name="daterange"]').daterangepicker({
        //
        //                beforeShow: function( input ) {
        //                    setTimeout(function() {
        //                        var headerPane = $( input )
        //                                .datepicker( "widget" )
        //                                .find( ".ui-datepicker-header" );
        //
        //                        $( "<button>", {
        //                            text: "Close",
        //                            click: function() {
        //                                $.datepicker.hide();
        //                            }
        //                        }).appendTo( headerPane );
        //                    }, 1 );
        //                },
        //                timePicker: true,
        //                timePickerIncrement: 30,
        //                locale: {
        //                    format: 'MM/DD/YYYY h:mm A'
        //                }
        //            });
        //
        //        });


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
                if($(option).attr('value') == selectedDegreeId ) {
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
            } else {

                $('form#form_edit_education input[class=slider_update]').prop({'checked': false});
                $('form#form_edit_education input[name=end_date]').val(dom.find('.end').val()).datepicker({
                    format: 'dd-mm-yyyy'
                });
            }

        });

        $('.slider_update').on('change', function () {




            if ($(this).is(':checked')) {
                $('.form_create_ecducation').formValidation('enableFieldValidators', 'end_date', false, 'date');
                $('.form_create_ecducation').formValidation('revalidateField', 'start_date');

                /*$(this).parent('label').parent('div').parent('section').siblings('section.find_end_date').find('input[name=end_date]').val('Present').datepicker('destroy');
                $(this).parent('label').parent('div').parent('section').siblings('section.find_end_date').find('input[name=end_date]').prop('readonly', true);
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('1');*/


                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').prop('readonly', true);
                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').val('Present').datepicker('destroy');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('1');

            } else {
                $('.form_create_ecducation').formValidation('revalidateField', 'end_date');
                $('.form_create_ecducation').formValidation('revalidateField', 'start_date');

               /* $(this).parent('label').parent('div').parent('section').siblings('section.find_end_date').find('input[name=end_date]').datepicker({
                    format: 'yyyy-mm-d'
                });
                $(this).parent('label').parent('div').parent('section').siblings('section.find_end_date').find('input[name=end_date]').val('');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('0');*/


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
                                if(result.rest_education<=0){
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



        $('.form_create_ecducation').formValidation({
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

                address: {
                    validators: {
                        notEmpty: {
                            message: 'Please input your school Address!'
                        },
                        stringLength: {
                            min: 5,
                            max: 100,
                            message: 'Your address must be between 5 to 100 character'
                        }
                    }
                },

                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'The start date is required'
                        },
                        date: {
                            format: 'DD-MM-YYYY',
                            max: 'end_date',
                            message: 'The start date is not a valid'
                        }
                    }
                },
                end_date: {
                    validators: {
                        notEmpty: {
                            message: 'The end date is required'
                        },
                        date: {
                            format: 'DD-MM-YYYY',
                            min: 'start_date',
                            message: 'The end date is not a valid'
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
                }
            }
        }).on('changeDate', '[name=start_date]', function() {

            var check = $(this).parent().parent().parent().siblings('div.switcher').find('input[name=is_present]').val();
            if(check == 1) {
                /*---disabled validation date ---*/
                $('.form_create_ecducation').formValidation('enableFieldValidators', 'end_date', false, 'date');
            } else {

                /*---revalidate the end date ---*/
                $('.form_create_ecducation').formValidation('revalidateField', 'start_date');
                $('.form_create_ecducation').formValidation('revalidateField', 'end_date');
            }
        }).on('changeDate', '[name=end_date]', function() {

            $('.form_create_ecducation').formValidation('revalidateField', 'start_date');
            $('.form_create_ecducation').formValidation('revalidateField', 'end_date');
        });

    </script>
@endsection