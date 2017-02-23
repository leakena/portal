@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {{--section content--}}
            <div class="col-xs-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        Header
                    </div>
                    <div class="box-body">
                        <ul>
                            <li>Item</li>
                            <li>Item</li>
                            <li>Item</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">What're you thinking?</h3>
                            </div>
                            <div class="box-body">
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" role="8" rows="4" name="body" id="body"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file"><span class="btn btn-primary"> <i class="fa fa-image"></i></span> Chose file image or pdf </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @for($i=0; $i<10; $i++)

                        <div class="col-xs-12">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-left">
                                                <img class="media-object" src="{{ asset('img/icon.png') }}" alt="Profile picture" style="width: 60px; height: 60px;">
                                            </div><!--media-left-->

                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    {{ $logged_in_user->name }}<br/>
                                                    <small>
                                                        <i class="fa fa-cog"></i> Published<br/>
                                                        Posted {{ \Carbon\Carbon::now()->diffForHumans() }}
                                                    </small>
                                                </h4>
                                            </div><!--media-body-->
                                        </li><!--media-->
                                    </ul><!--media-list-->
                                </div>
                                <div class="box-body">
                                    <article>{{ str_limit('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 200) }}</article>

                                    @if($i%2==0)
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><p>Filename.pdf</p></div>
                                        </div>
                                    @else
                                        <img src="{{ asset('img/images.jpg') }}" class="img-responsive"/>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endfor
                </div>
            </div>

            {{--section side bar--}}
            <div class="col-xs-3">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header">

                            </div>
                            <div class="box-body">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="{{ asset('img/icon.png') }}" alt="Profile picture" style="width: 60px; height: 60px;">
                                        </div><!--media-left-->

                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{ $logged_in_user->name }}<br/>
                                                <small>
                                                    {{ $logged_in_user->email }}<br/>
                                                    Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                                </small>
                                            </h4>

                                            {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                            @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                            @endauth
                                        </div><!--media-body-->
                                    </li><!--media-->
                                </ul><!--media-list-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4>Sidebar Item</h4>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4>Sidebar Item</h4>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4>Sidebar Item</h4>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->
@endsection