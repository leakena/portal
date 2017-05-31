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

        .sky-form .icon-append {
            right: 17px;
            padding: 1px 3px;
            min-width: 34px;
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

        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell;
        }


        textarea {
            display: inline-block;
            min-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }

    </style>
@endsection
@section('content')

    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.portal.resume.store_experience') }}" method="post"
              enctype="multipart/form-data" class="sky-form form-horizontal form_create_experience">
            <header>
                <a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                       href="#id_form" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-plus-square" id="add"> </i>
                </a>
                Create Your Experiences
            </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.experience.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>

    <div class="panel panel-profile">
        <div class="panel-body">
            <div class="row experience">
                @if(count($experiences)>0)
                    @foreach($experiences as $experience)
                        <div class="col-md-6">
                            <div class="tag-box tag-box-v3 margin-bottom-40 no-padding">
                                @include('frontend.new_portals.resumes.experience.partials.action')
                                <div id="" class="profile-edit blog_experience tab-pane fade in active">
                                    @include('frontend.new_portals.resumes.experience.partials.fields')
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <span class="no_experience"> There is no experience please click on button add to add experience</span>

                @endif
            </div>
        </div>
    </div>


    @include('frontend.new_portals.resumes.experience.partials.modal')

@endsection


@section('after-script-end')


    <script type="text/javascript">

        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });

        $('input[name="start_date"]').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('input[name="end_date"]').datepicker({
            format: 'dd-mm-yyyy'
        });

        $(document).on('click', '.btn_edit_experience', function (e) {
            e.preventDefault();

            var dom = $(this).parent().parent().parent().parent().children().eq(1);

            $('form#form_edit_experience input[name=experience_id]').val(dom.find('.experience_id').val());
            $('form#form_edit_experience input[name=position]').val((dom.find('.position').text()).trim());
            $('form#form_edit_experience input[name=company]').val((dom.find('.company').text()).trim());
            $('form#form_edit_experience input[name=address]').val((dom.find('.address').text()).trim());
            $('form#form_edit_experience input[name=start_date]').val(dom.find('.start').val());
            if (dom.find('.is_present').val() == true) {
                $('form#form_edit_experience input[class=slider_update]').prop({'checked': true});
                $('form#form_edit_experience input[name=is_present]').val(1);
                $('form#form_edit_experience input[name=end_date]').val('Present').datepicker('destroy').prop('readonly', true);
            } else {

                $('form#form_edit_experience input[class=slider_update]').prop({'checked': false});
                $('form#form_edit_experience input[name=end_date]').val(dom.find('.end').val()).datepicker({
                    format: 'dd-mm-yyyy'
                });
                $('form#form_edit_experience input[name=is_present]').val(0);
            }

            $('form#form_edit_experience textarea[name=description]').val((dom.find('.description').text()).trim());


        })

        $('.slider_update').on('change', function () {

            if ($(this).is(':checked')) {

                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').prop('readonly', true);
                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').val('Present').datepicker('destroy');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val(1);

            } else {

                $(this).parent('label').parent('div').parent('div').siblings('div.date').children('div').children('div.div_end_date').find('input[name=end_date]').prop('readonly', false).val('').datepicker({
                    format: 'dd-mm-yyyy'
                });
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val(0);

            }

        });


        $(document).on('click', '.btn_delete_experience', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');
            var dom = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this experience?",
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
                                if(result.rest_experience<=0){
                                    var no_experience = '<span class="no_experience"> There is no experience please click on button add to add experience </span>'
                                    $('div.experience').append(no_experience);

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

        validate_experience($('.form_create_experience'));
        validate_experience($('#form_edit_experience'));

        function validate_experience(object) {

            object.formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    position: {
                        validators: {
                            notEmpty: {
                                message: 'Please add your Position!'
                            },
                            stringLength: {
                                min: 3,
                                max: 15,
                                message: 'The position must be more than 3 and less than 15 characters long'
                            }
                        }
                    },

                    company: {
                        validators: {
                            notEmpty: {
                                message: 'Please input your company name!'
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
                        verbose:false,
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
                                callback: function(value, validator, $field) {

                                    var get_today = new Date();
                                    var selectedDate = validator.getFieldElements('start_date').val();
                                    var split  = selectedDate.split('-');
                                    var new_selecteddate = new Date(split[2], split[1] - 1, split[0]);


                                    var check = object.find('input[name=is_present]').val();
                                    if(check == 1) {
                                        object.formValidation('enableFieldValidators', 'end_date', false)
                                        if(new_selecteddate.getTime() > get_today.getTime()) {
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
                                min:'start_date',
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
            }).on('change', 'input[name=start_date]', function(e, data) {

                object.formValidation('revalidateField', 'start_date');



            }).on('change', '[name=end_date]', function(e, data) {


                object.formValidation('enableFieldValidators', 'end_date', true)
                        .formValidation('revalidateField', 'start_date')
                        .formValidation('revalidateField', 'end_date');

            }).on('change', '[name="slider_date"]', function(e) {

                var end_date = object.find('input[name="end_date"]').val(),
                        start_date = object.find('input[name="start_date"]').val(),
                        fv         = object.data('formValidation');

                if($(this).is(':checked')) {
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