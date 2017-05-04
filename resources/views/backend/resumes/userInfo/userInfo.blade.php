@extends('backend.layouts.resume')


@section('content')

    <div role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @if(isset($userResume))
                                <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                </button>
                            @endif

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'route' => 'frontend.resume.store_user_info', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-user-info']) !!}
                            <div class="row">
                                <div class="col-md-8">

                                    @if(isset($userResume))
                                        <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text"
                                                   id="name" name="name" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{isset($student)?$student['name_latin']:''}}" readonly>
                                        </div>
                                            <i class="fa fa-info-circle fa-lg information_name" aria-hidden="true" style="color: #00a7d0"></i>


                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital-status">Marital
                                            Status <span class="required">*</span>

                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="status_id" class="form-control col-md-7 col-xs-12" id="status">
                                                @foreach( $marital_statuses as $marital_status)
                                                    <option value="{{ $marital_status->id }}">{{ $marital_status->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div id="gender" class="btn-group" data-toggle="buttons">

                                                    @if($student)

                                                        <label class="gender btn btn-default {{($student['name_en'])?'active forcus':''}} ">
                                                            <input type="radio" name="gender_id"
                                                                   @if($student['name_en']) checked> {{ $student['name_en'] }}
                                                                   @endif
                                                        </label>
                                                    @else
                                                        <label class="gender btn btn-default">
                                                            <input type="radio" name="gender_id"
                                                                   value="{{ $gender->id }}" disabled> {{ $gender->name }}
                                                        </label>
                                                    @endif

                                            </div>
                                        </div>
                                        <i class="fa fa-info-circle fa-lg information_gender" aria-hidden="true" style="color: #00a7d0"></i>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12"
                                                       required="required" type="text" name="dob"
                                                       value="{{isset($student)?$student['dob']:''}}" readonly>
                                                <span class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </span>
                                            </div>
                                        </div>
                                        <i class="fa fa-info-circle fa-lg information_birth_place" aria-hidden="true" style="color: #00a7d0"></i>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth-place">Place of
                                            birth <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="birth-place" name="birth_place" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{isset($personalInfo)?$personalInfo->birth_place:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="email" name="email" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{isset($personalInfo)?$personalInfo->email:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="phone" name="phone" required="required"
                                                   class="form-control col-md-7 col-xs-12 "
                                                   value="{{isset($personalInfo)?$personalInfo->phone:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="address" name="address" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{isset($personalInfo)?$personalInfo->address:$student['address']}}">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-7">
                                            <button class="btn btn-default" type="reset">Reset</button>
                                            @if(isset($personalInfo))
                                                <button type="submit" class="btn btn-info">Update</button>
                                            @else
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="image-frame" style="width: 163px;height: 213px; border: 2px solid #f1f1f1; padding: 5px; box-sizing: border-box;">
                                            @if(isset($personalInfo->profile))
                                                <img class="profile" src="{{ asset('img/backend/resume/profile') }}/{{ $personalInfo->profile }}" alt=""/>
                                            @endif
                                        </div>
                                        <label class="control-label">Chose your profile</label>
                                        <input type="file" name="profile" accept="image/*">
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

    {{--modal preview cv--}}
    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')
    <script>

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

        } );

        $(document).on('click', '.information_gender', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit gender",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        } );

        $(document).on('click', '.information_birth_place', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit date of birth",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        } );


       /* $('#birthday').datepicker({
            format: 'yyyy-mm-d'
        })*/


    </script>
@endsection