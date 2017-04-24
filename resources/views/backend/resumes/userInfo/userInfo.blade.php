@extends('backend.layouts.resume')


@section('content')

    <div role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Personal Information </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />


                            {!! Form::open(['route' => 'frontend.resume.store_user_info', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-user-info']) !!}

                                @if(isset($userResume))
                                    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                @endif

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{isset($personalInfo)?$personalInfo->name:''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital-status">Marital Status <span class="required">*</span>

                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="status" class="form-control col-md-7 col-xs-12" id="status">
                                            <option name="Medium">Single</option>
                                            <option name="Good">Married</option>
                                            <option name="Excellent">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default">
                                                <input type="radio" name="gender" value="male">  Male
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="gender" value="female"> Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="dob" value="{{isset($personalInfo)?$personalInfo->dob:''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth-place">Place of birth <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="birth-place" name="birth_place" required="required" class="form-control col-md-7 col-xs-12" value="{{isset($personalInfo)?$personalInfo->birth_place:''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{isset($personalInfo)?$personalInfo->email:''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="{{isset($personalInfo)?$personalInfo->phone:''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" value="{{isset($personalInfo)?$personalInfo->address:''}}">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>


        @if(isset($personalInfo))
        var material_status = '{{$personalInfo->status}}'

        @else
        var material_status = ''
        @endif


        $('select[name=status] option').each(function (key, value) {
            var status = $(this).val();
            if(status == material_status) {
                $(this).prop('selected', true);

            }
        })

    </script>
@endsection