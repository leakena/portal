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

                <div class="x_panel">
                    <div class="x_title">
                        @if(isset($userResume))
                            <button type="button" class="btn btn-warning preview" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">
                                <i class="fa fa-eye" aria-hidden="true"></i> Preview
                            </button>
                        @endif

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="/resume/educations/save-education" method="POST" id="demo-form2"
                              data-parsley-validate class="form-horizontal form-label-left">

                            {{ csrf_field() }}
                            <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            <input name="education_id" type="hidden" value="{{ $education->id }}">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="school">School <span class="required">*</span>
                                    </label>
                                    <input name="school" type="text" id="school" class="form-control col-md-7 col-xs-12"
                                           value="{{ $education->school }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="major">Major <span class="required">*</span>
                                    </label>
                                    <input type="text" id="major" name="major" class="form-control col-md-7 col-xs-12"
                                           value="{{ $education->major }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Degree</label>
                                    <select name="degree" class="form-control single">

                                        @foreach($degrees as $degree)
                                            @if($degree->id == $education->degree->id)
                                                <option selected value="{{ $degree->id }}">{{ $degree->name }}</option>
                                            @else
                                                <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="address">Adress <span class="required">*</span>
                                    </label>
                                    <textarea type="text" id="address" name="address"
                                              class="form-control col-md-7 col-xs-12">{{ $education->address }}

                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label class="control-label" for="start_date">Start Date <span
                                                class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                               name="start_date" class="date-picker form-control start_date"
                                               value="{{ $education->start_date }}" readonly>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </span>
                                    </div>
                                </div>
                                @if($education->is_present == true)
                                    <div class="form-group col-md-5 find_end_date">
                                        <label class="control-label" for="end_date"> End Date <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                                   name="end_date" class="date-picker form-control"
                                                   value="Present" readonly>
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <input type="hidden" name="is_present" value="{{ $education->is_present }}">
                                        <label class="control-label">Till today
                                        </label>
                                        <div class="input-group">
                                            <label class="switch">
                                                <input checked type="checkbox" class="slider_update">
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group col-md-5 find_end_date">
                                        <label class="control-label" for="end_date"> End Date <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                                   name="end_date" class="date-picker form-control end_date"
                                                   value="{{ $education->end_date }}" readonly>
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <input type="hidden" name="is_present" value="{{ $education->is_present }}">
                                        <label class="control-label">Till today
                                        </label>
                                        <div class="input-group">
                                            <label class="switch">
                                                <input type="checkbox" class="slider_update">
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-11">
                                    <button type="submit" class="btn btn-info">Update</button>
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

        $(".add_education").hide();

        $(document).on('click', "#add", function () {
            $(".add_education").toggle();
        });
        $('.add_new').hide();
        $('.add_new').first().show();
        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_edu', function (event) {
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

        })

        $('.start_date').datepicker({
            format: 'yyyy-mm-d'
        })
        $('.end_date').datepicker({
            format: 'yyyy-mm-d'
        })

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