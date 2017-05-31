@extends('frontend.layouts.master_portal')

@section('content')

    <!--=== Profile ===-->

    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'route' => 'frontend.portal.resume.upload_profile', 'class' => 'form-horizontal create_user_info', 'role' => 'form', 'method' => 'post', 'id' => 'create-user-info']) !!}


                    <div class="col-md-5">
                        <div class="image-frame"
                             style="width: 163px;height: 213px; border: 2px solid #f1f1f1; padding: 5px; box-sizing: border-box;">
                            <img class="img-responsive profile-img margin-bottom-20 img" src="{{ isset($profile->profile)?url('img/backend/profile/'.$profile->profile):url('portals/assets/img/team/img32-md.jpg') }}" alt="" style="width: 100%" >
                        </div>
                        {{--<label class="control-label">Chose your profile</label>--}}
                        <input type="file" class="filestyle" id="image" name="profile" accept="image/*" data-input="false" data-icon="false" data-badge="false">
                        <input type="submit" class="btn btn-primary" value="Upload" style="margin-top: -55px; margin-left: 100px; ">

                        {{--<a class="btn-u btn-u-sm upload-image">Change Picture</a>--}}
                    </div>
                {!! Form::close() !!}


                <div class="col-md-7">
                    <h2>{{$authUser->name}}</h2>
                    <span><strong>Job:</strong> {{ $profile->job }} </span>
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
    <script type="text/javascript" src="{{ url('bower_components/bootstrap-filestyle/src/bootstrap-filestyle.js') }}"> </script>
    <script>

        $(document).ready(function (e) {
            //show_language();
            getCircleLanguages();

        });

        function getCircleLanguages() {
            $.ajax({
                type: 'POST',
                url: '{!! route('frontend.resume.getCircleLanguages') !!}',
                data: {_token: '{!! csrf_token() !!}'},
                success: function (response) {
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

        $("input[name=profile]").change(function(){
            readURL(this);
        });


    </script>
@endsection



