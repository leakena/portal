@extends('frontend.layouts.master_portal')

@section('content')

    <div class="profile-body margin-bottom-20">
        <!--Profile Blog-->


        @if(count($classmates) > 0)

            @foreach($classmates as $mates)

                <div class="row margin-bottom-20">

                    @foreach($mates as $mate)
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="{{isset($userResumes[$mate['id_card']])?asset('img/backend/profile'.'/'. $userResumes[$mate['id_card']]['profile']):asset('portals/assets/img/avatar.png')}}" alt="">
                                <div class="name-location">
                                    <strong>{{$mate['name_latin']}}</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Cambodia,</a> <a href="#">{!! isset($userResumes[$mate['id_card']])?$userResumes[$mate['id_card']]['birth_place']: 'Phnom Penh' !!}</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>{!! isset($userResumes[$mate['id_card']])?$userResumes[$mate['id_card']]['career_profile']: 'I dont want you to see me on the page of portal So Check OFFF' !!}</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-id-card"></i><a href="#">ID: {{$mate['id_card']}}</a></li>
                                    <?php $dob = explode(' ', $mate['dob']) ;?>
                                    <li><i class="fa fa-birthday-cake"></i><a href="#"> {{ DateManager::fullDate($dob[0]) }}</a></li>
                                    {{--<li><i class="fa fa-share"></i><a href="#">Share</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div><!--/end row-->


            @endforeach

            <!--End Profile Blog-->
                <a href="{{$url.'?page='.($page+1)}}" class="btn-u btn-u-default btn-block text-center">Load More</a>
                <!--End Profile Blog-->

        @else

            <div class="row margin-bottom-20">
                <h1>No More Class Mates</h1>
            </div><!--/end row-->

        @endif


    </div>

@endsection