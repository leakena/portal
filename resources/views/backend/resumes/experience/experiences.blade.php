@extends('backend.layouts.resume')

<link rel="stylesheet" href="{{ asset('css/backend/resume/resume.css') }}"/>
<style>
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
</style>

@section('content')
    <div role="main">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger error_message_alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(count($experiences)>0)
                    @foreach($experiences as $experience)
                        <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new"
                                data-toggle="modal"
                                data-target="#add-career-profile"><i class="fa fa-plus"
                                                                     style="font-size: 14pt; color: #00a7d0"> </i>
                        </button>
                        @if(isset($userResume))
                            <button type="button" class="btn btn-sm btn-warning preview" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">
                                <i class="fa fa-eye" aria-hidden="true"></i> Preview
                            </button>
                        @endif

                        <div class="x_panel">
                            <div class="x_title">

                                <ul class="nav navbar-left panel_toolbox">
                                    <li>
                                        <a class="btn_edit_exp"
                                           href="{{ route('frontend.resume.edit_experience',$experience->id) }}">
                                            <i class="fa fa-pencil" aria-hidden="true" style="color: deepskyblue"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn_delete_exp"
                                           href="{{ route('frontend.resume.remove_experience',$experience->id) }}">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </li>
                                </ul>


                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="/resume/save-experience" method="POST" id="demo-form2"
                                      data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                    <input type="hidden" name="experience_id" value="{{ $experience->id }}">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3 col-xs-12" for="position">
                                                <b><p>Position </p>
                                                </b>
                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                {{ $experience->position }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3 col-xs-12" for="company">
                                                <b><p>Company</p>
                                                </b>

                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                {{ $experience->company}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3 col-xs-12" for="Address">
                                                <b><p>Address</p>
                                                </b>
                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                {!! $experience->address !!}
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3 col-xs-12" for="description">
                                                <b><p>Description</p>
                                                </b>
                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                {!! $experience->description !!}
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <b><p>Start Date</p>
                                            </b>
                                        </div>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            {{ $experience->start_date }}
                                        </div>
                                    </div>
                                    @if($experience->is_present == true)
                                        <div class="form-group col-md-6 find_end_date">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <b><p>End Date</p>
                                                </b>
                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                Present
                                            </div>
                                        </div>

                                    @else
                                        <div class="form-group col-md-6 find_end_date">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <b><p>End Date</p>
                                                </b>
                                            </div>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                {{ $experience->end_date }}
                                            </div>
                                        </div>

                                    @endif


                                </form>
                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="x_panel">
                        <div class="x_title">
                            <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new"
                                    data-toggle="modal"
                                    data-target="#add-career-profile"><i class="fa fa-plus"
                                                                         style="font-size: 14pt; color: #00a7d0"> </i>
                            </button>
                            @if(isset($userResume))
                                <button type="button" class="btn btn-warning preview" data-toggle="modal"
                                        data-target=".bs-example-modal-lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                </button>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h5>There is no experience, Click on button add to add experience</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div role="main" class="add_experience" style="display: none">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Experience </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="/resume/save-experience" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @if(isset($userResume))
                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="position">Position <span class="required">*</span>
                                    </label>
                                    <input type="text" id="company" name="company"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="company">Company <span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="position" name="position"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Address <span
                                                class="required">*</span>
                                    </label>
                                    <textarea type="text" id="description" name="address"
                                              class="form-control">
                                            </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Description <span
                                                class="required">*</span>
                                    </label>
                                    <textarea type="text" id="description" name="description"
                                              class="form-control">
                                            </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label class="control-label">Start Date <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                               name="start_date" class="date-picker form-control start_date"
                                               readonly>
                                        <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-5 find_end_date">
                                    <label class="control-label">End Date <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                               name="end_date" class="date-picker form-control end_date"
                                               readonly>
                                        <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                    </div>

                                </div>
                                <div class="form-group col-md-2">
                                    <input type="hidden" class="is_present" name="is_present"
                                           value="{{ isset($experience)?$experience->is_present:'' }}">
                                    <label class="control-label">Till today
                                    </label>
                                    <div class="input-group">
                                        <label class="switch">
                                            <input type="checkbox" class="slider_update">
                                            <div class="slider round"></div>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">
                                    <button class="btn btn-default" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')

    <script>
        $(".add_experience").hide();
        $(document).on('click', "#add", function () {
            $(".add_experience").toggle();
        });

        $('.add_new').hide();
        $('.add_new').first().show();


        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_exp', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');

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
                                    setTimeout(function () {// wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 3000);
                                }
                            }
                        })

                    } else {
                        swal("Cancelled", "Your experience is safe :)", "error");
                    }
                });
        });

        $('.start_date').datepicker({
            format: 'yyyy-mm-d'
        });
        $('.end_date').datepicker({
            format: 'yyyy-mm-d'
        });


        $('.slider_update').on('change', function () {
            if ($(this).is(':checked')) {

                $(this).parent('label').parent('div').parent('div').siblings('div.find_end_date').find('input[name=end_date]').val('Present').datepicker('destroy');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('1');

            } else {

                $(this).parent('label').parent('div').parent('div').siblings('div.find_end_date').find('input[name=end_date]').datepicker({
                    format: 'yyyy-mm-d'
                });
                $(this).parent('label').parent('div').parent('div').siblings('div.find_end_date').find('input[name=end_date]').val('');
                $(this).parent('label').parent('div').siblings('input[name=is_present]').val('0');


            }

        });

        setTimeout(function () {
            if ($('.error_message_alert').is(':visible')) {
                $('.error_message_alert').fadeOut();
            }

        }, 3000);


    </script>



@endsection