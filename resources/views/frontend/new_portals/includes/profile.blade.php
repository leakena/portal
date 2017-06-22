@extends('frontend.layouts.master_portal')

@section('content')
    <div class="profile-body margin-bottom-20">
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Personal Information</a></li>
                <li><a data-toggle="tab" href="#edit_profile">Edit Personal Information</a></li>
            </ul>
            <div class="tab-content">
                <!--=== Profile ===-->
                <div class="profile-body tab-pane fade in active" id="profile">
                    <div class="profile-bio">
                        <div class="row">
                            {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'route' => 'frontend.portal.resume.upload_profile', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-profile-pic']) !!}

                            @if(isset($resume))
                                <input type="hidden" name="resume_uid" class="resume" value="{{ $resume->id }}">
                            @endif
                            @if(isset($profile))
                                <input type="hidden" name="personalInfo_id" value="{{ $profile->id }}">
                            @endif
                            <div class="col-md-5">
                                <img class="img-responsive profile-img margin-bottom-20 img"
                                     src="{{ isset($profile->profile)?url('img/backend/profile/'.$profile->profile):url('portals/assets/img/team/img32-md.jpg') }}"
                                     alt="">
                                {{--<label class="control-label">Chose your profile</label>--}}
                                {{--<div class="col-md-6 " style="padding-right: 0px">--}}
                                {{--<input type="file" class="btn btn-u " style="display: none" id="choose_file_upload" name="file" accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">--}}
                                {{--<button class="btn-u btn-brd rounded btn-u-green btn-u-sm" id="choose_file">--}}
                                {{--<i class="fa fa fa-unlink"></i>--}}
                                {{--Attach File--}}
                                {{--</button>--}}

                                {{--</div>--}}


                                {{--<input type="file" class="filestyle" id="image" name="profile" accept="image/*" data-input="false" data-icon="false" data-badge="false" style="width: 100% !important;">--}}
                                <input type="file" class="btn btn-u " style="display: none" id="image" name="profile"
                                       accept="image/*">
                                <button class="btn-u btn-brd btn-u-green btn-u-sm" id="choose_profile"
                                        style="width: 49%; margin-top: -10px">
                                    <i class="fa fa fa-unlink"></i>
                                    Attach File
                                </button>

                                <input type="submit" class="btn-md btn-primary btn-u upload" value="Upload"
                                       style="margin-top: -09px; width: 49%; float: right ">

                                {{--<a class="btn-u btn-u-sm upload-image">Change Picture</a>--}}
                            </div>
                            {!! Form::close() !!}

                            <div class="col-md-7">
                                @if(isset($resume))
                                    @if($resume->publish == true)
                                        <button class="btn btn-u btn-sm pull-right publish"><i
                                                    href="{{ route('frontend.resume.print', $resume->id) }}"
                                                    class="fa fa-eye fa-lg"></i> Unpublish CV
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-u pull-right publish" data-toggle="modal"
                                                data-target=".publish_resume"><i class="fa fa-eye fa-lg"></i> Publish CV
                                        </button>

                                        {{--<button class="btn btn-warning pull-right publish" title="Here is your resume link" data-toggle="popover" data-placement="bottom" data-content="">Publish CV</button>--}}
                                    @endif
                                    <button class="btn btn-u btn-u-default btn-sm pull-right print "><i
                                                href="{{ route('frontend.resume.print', $resume->id) }}"
                                                class="fa fa-print fa-lg"></i></button>
                                    <div class="modal fade publish_resume" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="input-group" style="width: 86%;">
                                                                <input type="text" id="foo" class="form-control"/>
                                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" data-clipboard-target="#foo"
                                                            type="button" id="btn_copied">Copy</button>
                                                  </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                <h2>{{$authUser->name}}</h2>
                                <span><strong>Gender:</strong>{{ isset($student)?$student['name_en']:'' }}</span>
                                <span><strong>Date of birth:</strong> {{ isset($profile)?$profile->dob:'' }} </span>
                                <span><strong>Place of birth:</strong> {{ isset($profile)?$profile->birth_place:'' }} </span>
                                <span><strong>Marital status:</strong> {{ isset($profile)?$profile->status->name:'' }} </span>
                                <span><strong>Job:</strong> {{ isset($profile)?$profile->job:'' }} </span>
                                <span><strong>Phone number:</strong> {{ isset($profile)?$profile->phone:'' }} </span>
                                <span><strong>Email:</strong> {{ isset($profile)?$profile->email:'' }} </span>
                                <hr>
                                <span><strong>{!! isset($resume)?$resume->career_profile: ''  !!} </strong></span>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <hr>
                    <!--Timeline-->
                    <div class="panel panel-profile">
                        {{--Experience Panel--}}
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Experience</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        @include('frontend.new_portals.includes.partials.profile.experience')
                        {{--End Experience Panel--}}
                    </div>
                    <hr>
                    <!--End Timeline-->

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        {{--Education Panel--}}
                        @include('frontend.new_portals.includes.partials.profile.education')
                        {{--End Education--}}
                    </div>
                    <!--End Timeline-->
                    <hr>
                    <div class="row">
                        <!--Skills-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            @include('frontend.new_portals.includes.partials.profile.skill')
                        </div>
                        <!--End Skills-->
                        <!--Design Language Skills-->
                        <div class="col-sm-6">
                            @include('frontend.new_portals.includes.partials.profile.language')
                        </div>
                        <!--End Design Language Skills-->
                    </div><!--/end row-->

                    {{-- Reference --}}
                    <hr>
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Reference </h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        {{--Education Panel--}}
                        @include('frontend.new_portals.includes.partials.profile.reference')
                        {{--End Reference--}}
                    </div>
                </div>
                <!--=== End Profile ===-->
                @include('frontend.new_portals.includes.partials.profile.tab.edit_profile')

            </div>
        </div>
    </div>


@endsection


@section('after-script-end')
    <script type="text/javascript"
            src="{{ asset('bower_components/bootstrap-filestyle/src/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('node_modules/clipboard/dist/clipboard.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function (e) {
            $('#save_personal_info').hide();
            $('#btn_copied').click(function () {
                var self = $(this);
                self.text('Copied');
            });
            new Clipboard('.btn');
            //$(":file").filestyle('width', '1000%');
            //show_language();
            getCircleLanguages();
            $('.upload').on('click', function (e) {
                e.preventDefault();
                var dom = $(this).siblings('#image').val();
                if (dom == '') {
                    notify('error', 'File has not chosen!', 'Please choose file before upload');
                } else {
                    $('#create-profile-pic').submit();
                }

            });

            $('button[id=choose_profile]').on('click', function (e) {
                e.preventDefault();
                $('#image').click();
            });

            $(document).on('click', '.print', function () {
                event.preventDefault();
                var left = ($(window).width() / 2) - (980 / 2),
                    top = ($(window).height() / 2) - (400 / 2),
                    popup = window.open($(this).children().attr("href"), "popup", "width=980, height=400, top=" + top + ", left=" + left);
                popup.print();

            });

            $(document).on('click', '.publish', function () {
                var resume_id = $(this).parent().parent().find('.resume').val();
                var dom = $(this);
                $.ajax({
                    type: 'POST',
                    url: '{!! route('frontend.resume.publish_resume') !!}',
                    data: {
                        _token: '{!! csrf_token() !!}',
                        'resume_id': resume_id
                    },
                    success: function (Response) {
                        if (Response.status === true) {
                            var unpublish = '<button class="btn btn-sm btn-u pull-right publish"><i class="fa fa-eye fa-lg"></i> Unpublish CV </button>'
                            dom.after(unpublish);
                            console.log(dom.siblings('.publish_resume').find('input'));
                            dom.siblings('.publish_resume').find('input').val(Response.url);
                            dom.remove();


                        }
                        else {
                            var publish = '<button class="btn btn-sm btn-u pull-right publish" data-toggle="modal" data-target=".publish_resume"><i class="fa fa-eye fa-lg"></i> Publish CV </button>'
                            dom.after(publish);
                            dom.remove();

                        }
                    }
                });
            })

        });



        function getCircleLanguages() {
            $.ajax({
                type: 'POST',
                url: '{!! route('frontend.resume.getCircleLanguages') !!}',
                data: {_token: '{!! csrf_token() !!}'},
                success: function (response) {
                    if (response) {
                        if (response.data.length > 0) {
                            $.each(response.data, function (key, val) {

                                if (val.proficiency == 'Mother Tongue') {
                                    var languageCircle = function () {

                                        return {
                                            initCircles: function () {

                                                //Circles 4
                                                Circles.create({
                                                    id: val.language_id,
                                                    percentage: 90,
                                                    radius: 40,
                                                    width: 4,
                                                    number: 90,
                                                    text: '%',
                                                    colors: ['#eee', '#72c02c'],
                                                    duration: 2000
                                                })
                                            }
                                        }

                                    }();

                                    languageCircle.initCircles();
                                } else {
                                    var languageCircle = function () {
                                        var value = '';
                                        value = val.proficiency;
                                        value.replace('%', '');
                                        return {
                                            initCircles: function () {

                                                //Circles 4
                                                Circles.create({
                                                    id: val.language_id,
                                                    percentage: parseInt(value),
                                                    radius: 40,
                                                    width: 4,
                                                    number: parseInt(value),
                                                    text: '%',
                                                    colors: ['#eee', '#72c02c'],
                                                    duration: 2000
                                                })
                                            }
                                        }

                                    }();

                                    languageCircle.initCircles();
                                }
                            })
                        }
                    }

                }
            })
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("input[name=profile]").change(function () {
            readURL(this);
        });



//        Script for edit profile

        $(document).on('click', '.edit', function () {
            var dom = $(this).parent().parent().parent();
            var old_value = dom.find('.old').text();


            if (dom.find('input').prop('type') == 'hidden' || dom.find('textarea').is(':hidden')) {

                dom.find('textarea').prop('hidden', false).addClass('show_save').focus();
                dom.find('input').prop('type', 'text').addClass('show_save').focus();
                dom.find('.old').hide();
            } else {

                dom.find('textarea').prop({'hidden': true, 'value': old_value}).removeClass('show_save');
                dom.find('input').prop({'type': 'hidden', 'value': old_value}).removeClass('show_save');
                dom.find('.old').show().text(dom.find('input').val());

            }

            if ($('form[class=add_personal_info]').find('.show_save').length != 0) {
                $('#save_personal_info').show();
            } else {
                $('#save_personal_info').hide();
            }

        });


        $(document).on('click', '.edit_new', function () {
            var dom = $(this).parent().parent().parent().find('.editing');
            var edit = '';
            edit += '<input class="form-group" style="width: 70%; " name="' + dom.prop('id') + '" value="' + (dom.text()).trim() + '">';

            dom.html(edit);
            // console.log(dom.prop('type'))


        });

        $(document).on('click', '.edit_status', function () {
            var dom = $(this).parent().parent().parent();

            var selectedStatus = $(this).parent().parent().parent().find('.old_status').text();

            var temp = $(this);

            if (dom.find('input').hasClass('status_id')) {

                temp.parent().parent().parent().find('input[name=status_id]').prop({
                    'name': 'not_status',
                    'class': 'not_status'
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('frontend.resume.get_marital_status') }}',
                    data: {
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function (result) {
                        if (result.status = true) {
                            var edit = '';
                            edit += '<select name="status_id" class="form-control col-md-7 col-xs-12 show_save" id="status" style="width: 80%">';

                            $.each(result.statues, function (key, val) {
                                if (val.name == selectedStatus) {
                                    edit += '<option selected value="' + val.id + '">' + val.name + '</option>';
                                } else {
                                    edit += '<option value="' + val.id + '">' + val.name + '</option>';
                                }

                            });

                            dom.find('.editing').html(edit);
                            dom.parent().parent().find('#save_personal_info').show();
                            console.log(dom.parent().parent())
                            temp.parent().parent().parent().find('.old_status').hide();
                        }

                    }

                });

            } else {

                temp.parent().parent().parent().find('#status').remove();
                temp.parent().parent().parent().find('input[name=not_status]').prop({
                    'name': 'status_id',
                    'class': 'status_id'
                });

                temp.parent().parent().parent().find('.old_status').show();
                if ($('form[class=add_personal_info]').find('.show_save').length != 0) {
                    $('#save_personal_info').show();
                } else {
                    $('#save_personal_info').hide();
                }
            }


        });

        $(document).on('click', '.edit_create_status', function () {
            var dom = $(this).parent().parent().parent().find('.editing');

            var temp = $(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('frontend.resume.get_marital_status') }}',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: function (result) {
                    if (result.status = true) {
                        var edit = '';
                        edit += '<select name="status_id" class="form-control col-md-7 col-xs-12" id="status" style="width: 80%">';

                        $.each(result.statues, function (key, val) {

                            edit += '<option value="' + val.id + '">' + val.name + '</option>';

                        });

                        dom.find('.editing').html(edit);
                        temp.parent().parent().parent().find('.old').hide();

                    }

                }

            });

        });

        $(document).on('click', '.dob-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit date of birth!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.name-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit name!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.id-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit id card!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.gender-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit gender!', 'If you want to edit please contact to administration office');
        });

        $(document).on('click', '.save', function (e) {
            e.preventDefault();

            var dom = $(this).siblings();
            var temp = $(this);


            var status_name = dom.find('select option:selected').text();

            if (status_name == '') {
                status_name = dom.find('.old_status').text();
            }
            var user = $(this).siblings('input[name=user_uid]').val();

            var birth_place = dom.find('input[name=birth_place]').val();
            var career_profile = dom.find('textarea[name=career_profile]').val();

            var status_id = dom.find('input[name=status_id]').val();
            if (status_id) {
                console.log(status_id);
            } else {
                status_id = dom.find('select option:selected').val();
            }


            var job = dom.find('input[name=job]').val();
            var phone = dom.find('input[name=phone]').val();
            var email = dom.find('input[name=email]').val();
            var address = dom.find('input[name=address]').val();

            if (birth_place == "") {
                notify('error', 'Place of birth cannot be null!', 'Please input your place of birth');
            } else if (career_profile == "") {
                notify('error', 'Your summery cannot be null!', 'Please input your summery');
            } else if (status_id == "") {
                notify('error', 'Marital status cannot be null!', 'Please choose your marital status');
            } else if (job == "") {
                notify('error', 'Job cannot be null!', 'Please input your job');
            } else if (phone == "") {
                notify('error', 'Phone cannot be null!', 'Please input your phone number');
            } else if (email == "") {
                notify('error', 'Email cannot be null!', 'Please input your phone email');
            } else if (address == "") {
                notify('error', 'Address cannot be null!', 'Please input your address');
            } else {
//                $('.add_personal_info').submit();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('frontend.resume.store_user_info') }}',
                    data: {
                        _token: '{!! csrf_token() !!}',
                        'user_uid': user,
                        'name': dom.find('input[name=name]').val(),
                        'dob': dom.find('input[name=dob]').val(),
                        'birth_place': birth_place,
                        'career_profile': career_profile,
                        'status_id': status_id,
                        'status_name': status_name,
                        'job': job,
                        'phone': phone,
                        'email': email,
                        'address': address
                    },
                    success: function (response) {
                        if (response.status == true) {
                            notify('success', 'Successful!', 'Your personal information was saved');
                            temp.hide();
                            dom.find('input[name=birth_place]').remove();
                            dom.find('input[name=not_status]').remove();
                            dom.find('textarea[name=career_profile]').remove();
                            dom.find('input[name=job]').remove();
                            dom.find('input[name=phone]').remove();
                            dom.find('input[name=email]').remove();
                            dom.find('input[name=address]').remove();

                            var birth_place = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="birth_place" style="width: 80%" value="' + response.birth_place + '">';
                            birth_place += '<span class="old editing" id="birth_place">' + response.birth_place + '</span>';
                            $('#birth_place').after(birth_place);
                            $('#birth_place').remove();

                            var career_profile = '<textarea class="col-md-7 col-xs-12" hidden name="career_profile" style="width: 80%">' + response.career_profile + '</textarea>';
                            career_profile += '<span id="career_profile" class="editing old">' + response.career_profile + '</span>';
                            $('#career_profile').after(career_profile);
                            $('#career_profile').remove();

                            var marital_status = '<span id="status_id" class="editing"></span>';
                            marital_status += '<input type="hidden" name="status_id" class="status_id" value="' + response.status_id + '">'
                            marital_status += '<span class="old_status">' + status_name + '</span>'
                            $('.old_status').remove();
                            $('#status_id').after(marital_status);
                            $('#status_id').remove();

                            var job = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="job" style="width: 80%" value="' + response.job + '">';
                            job += '<span class="old editing" id="job">' + response.job + '</span>';
                            $('#job').after(job);
                            $('#job').remove();

                            var phone = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="phone" style="width: 80%;" value="' + response.phone + '">';
                            phone += '<span class="old editing" id="phone">' + response.phone + '</span>';
                            $('#phone').after(phone);
                            $('#phone').remove();


                            var email = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="email" style="width: 80%;" value="' + response.email + '">';
                            email += '<span class="old editing" id="email">' + response.email + '</span>';
                            $('#email').after(email);
                            $('#email').remove();

                            var address = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="address" style="width: 80%" value="' + response.address + '">';
                            address += '<span class="old editing" id="address">' + response.address + '</span>';
                            $('#address').after(address);
                            $('#address').remove();

                        }
                    }
                })
            }

        })



    </script>
@endsection



