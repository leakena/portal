@extends('frontend.layouts.master_portal')

@section('content')

    <!--=== Profile ===-->

    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive md-margin-bottom-10" src="{{url('portals/assets/img/team/img32-md.jpg')}}" alt="">
                    <a class="btn-u btn-u-sm" href="#">Change Picture</a>
                </div>
                <div class="col-md-7">
                    <h2>{{$authUser->name}}</h2>
                    <span><strong>Job:</strong> System-Engineering </span>
                    <span><strong>Position:</strong> Web Developer </span>
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
    </div>
    <!--=== End Profile ===-->
@endsection


@section('after-script-end')



@endsection