@extends('backend.layouts.resume')

@section('content')


    @if(isset($personalInfo))


        <div role="main">
            <div class="">
                <div class="clearfix"></div>
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
                    <div class="col-md-12 col-sm-12 col-xs-12 show1">
                        <div class="x_panel">
                            <div class="x_title">
                                @if(isset($userResume))
                                    <button type="button" class="btn btn-warning preview" data-toggle="modal"
                                            data-target=".bs-example-modal-lg">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                    </button>
                                @endif
                                <button type="submit" class="btn btn-info edit1">Edit</button>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'route' => 'frontend.resume.store_user_info', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-user-info']) !!}
                                <div class="row">
                                    <div class="container">


                                        <div class="col-md-8">

                                            @if(isset($userResume))
                                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                            @endif

                                            <div class="form-group">
                                                <div class="col-md-3 col-sm-3 col-xs-12" for="name">
                                                    <b><p class="pull-right">Name </p>
                                                    </b>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>{{isset($student)?$student['name_latin']:''}}</p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class=" col-md-3 col-sm-3 col-xs-12" for="marital-status">
                                                    <b><p class="pull-right">Marital Status </p></b>

                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>{{$personalInfo->status->name}}</p>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <b><p class="pull-right">Gender </p>
                                                    </b>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div id="gender" class="btn-group" data-toggle="buttons">

                                                        @if($student)

                                                            {{ $student['name_en'] }}

                                                        @else
                                                            <label class="gender btn btn-default">
                                                                <input type="radio" name="gender_id"
                                                                       value="{{ $gender->id }}"
                                                                       disabled> {{ $gender->name }}
                                                            </label>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <b><p class="pull-right">Date Of Birth </p></b>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>{{(isset($student)?(new \Carbon\Carbon($student['dob']))->toDateString():'')}}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-sm-3 col-xs-12" for="birth-place">
                                                    <b><p class="pull-right">Place of birth </p></b>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <p>{{isset($personalInfo)?$personalInfo->birth_place:''}}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-sm-3 col-xs-12" for="email">
                                                    <b><p class="pull-right">E-mail </p>
                                                    </b>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{isset($personalInfo)?$personalInfo->email:''}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12" for="phone">
                                                    <p class="pull-right">Phone </p>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{isset($personalInfo)?$personalInfo->phone:''}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12" for="address">
                                                    <p class="pull-right">Address </p>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    {{isset($personalInfo)?$personalInfo->address:$student['address']}}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="image-frame"
                                                     style="width: 163px;height: 213px; border: 2px solid #f1f1f1; padding: 5px; box-sizing: border-box;">
                                                    @if(isset($personalInfo->profile))
                                                        <img class="profile"
                                                             src="{{ asset('img/backend/resume/profile') }}/{{ $personalInfo->profile }}"
                                                             alt=""/>
                                                    @endif
                                                </div>
                                                <label class="control-label">Chose your profile</label>
                                                <input type="file" name="profile" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.resumes.userInfo.partial.edit_personalInfo')
    @else
        @include('backend.resumes.userInfo.partial.edit_personalInfo')
    @endif



    {{--modal preview cv--}}
    @include('backend.resumes.includes.modal.preview')

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.update1').hide();
            $('.edit1').on('click', function () {
                $('.update1').toggle();
                $('.show1').hide();
            })
        })


                @if(isset($personalInfo))
        var material_status = '{{$personalInfo->status_id}}'
                @else
        var material_status = ''
        @endif

        $(document).on('click', '.gender', function () {
            /* $('#gender').find('.focus').removeClass('focus');
             $('#gender').find('.active .focus').removeClass('active focus');
             $(this).addClass('active focus');*/


        });

        $('label.gender').on('click', function (e) {
            $(this).prop('disabled', true);
        })

        $('select[name=status_id] option').each(function (key, value) {
            var status = $(this).val();
            if (status == material_status) {
                $(this).prop('selected', true);

            }
        });

        $(document).on('click', '.information_name', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit name",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        });

        $(document).on('click', '.information_gender', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit gender",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        });

        $(document).on('click', '.information_birth_place', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit date of birth",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        });


        /* $('#birthday').datepicker({
         format: 'yyyy-mm-d'
         })*/


    </script>
@endsection


