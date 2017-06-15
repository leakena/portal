@extends('frontend.layouts.master_portal')

@section('content')

    <!--=== Profile ===-->

    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'route' => 'frontend.portal.resume.upload_profile', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-profile-pic']) !!}

                @if(isset($resume))
                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}">
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
                    <h2>{{$authUser->name}}</h2>
                    <span><strong>Job:</strong> {{ isset($profile)?$profile->job:'' }} </span>
                    <hr>
                    {!! isset($resume)?$resume->career_profile: ''  !!}
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
@endsection


@section('after-script-end')
    <script type="text/javascript"
            src="{{ url('bower_components/bootstrap-filestyle/src/bootstrap-filestyle.js') }}"></script>
    <script>

        $(document).ready(function (e) {
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

        {{--$(document).on('change', 'input[name=upload-profile]', function (e) {--}}
        {{--e.preventDefault();--}}


        {{--var file_data = $('#image').prop("files")[0];--}}
        {{--var CSRF_TOKEN = $('input[name="_token"]').val();--}}

        {{--console.log(file_data)--}}


        {{--$.ajax({--}}
        {{--type: 'POST',--}}
        {{--url: '{{ route('frontend.portal.resume.upload_profile') }}' + '?_token=' + CSRF_TOKEN,--}}
        {{--processData: false, // important--}}
        {{--contentType: false, // important--}}
        {{--dataType: 'JSON',--}}
        {{--data: {--}}
        {{--_token: '{!! csrf_token() !!}',--}}
        {{--'file_data': new FormData($("#image")[0]),--}}
        {{--},--}}
        {{--success: function (response) {--}}
        {{--if(response.status == true){--}}

        {{--var image = '<img class="profile" src="{{ asset('img/backend/resume/profile') }}/' + response.profile + 'alt=""/>';--}}
        {{--$('.img').html(image);--}}


        {{--}--}}
        {{--}--}}
        {{--});--}}

        {{--});--}}

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


    </script>
@endsection



