@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-7">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">What're you thinking?</h3>
                            </div>
                            <div class="box-body">
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" role="8" rows="8" name="body" id="body"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file"><span class="btn btn-primary"> <i class="fa fa-image"></i></span> Chose file image or pdf </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-offset-1 col-xs-4">
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
        {{--<div class="col-xs-12">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>--}}

                {{--<div class="panel-body">--}}

                    {{--<div class="row">--}}

                        {{--<div class="col-md-4 col-md-push-8">--}}

                            {{--<ul class="media-list">--}}
                                {{--<li class="media">--}}
                                    {{--<div class="media-left">--}}
                                        {{--<img class="media-object" src="{{ $logged_in_user->picture }}" alt="Profile picture">--}}
                                    {{--</div><!--media-left-->--}}

                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">--}}
                                            {{--{{ $logged_in_user->name }}<br/>--}}
                                            {{--<small>--}}
                                                {{--{{ $logged_in_user->email }}<br/>--}}
                                                {{--Joined {{ $logged_in_user->created_at->format('F jS, Y') }}--}}
                                            {{--</small>--}}
                                        {{--</h4>--}}

                                        {{--{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}--}}

                                        {{--@permission('view-backend')--}}
                                        {{--{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}--}}
                                        {{--@endauth--}}
                                    {{--</div><!--media-body-->--}}
                                {{--</li><!--media-->--}}
                            {{--</ul><!--media-list-->--}}

                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading">--}}
                                    {{--<h4>Sidebar Item</h4>--}}
                                {{--</div><!--panel-heading-->--}}

                                {{--<div class="panel-body">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.--}}
                                {{--</div><!--panel-body-->--}}
                            {{--</div><!--panel-->--}}

                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading">--}}
                                    {{--<h4>Sidebar Item</h4>--}}
                                {{--</div><!--panel-heading-->--}}

                                {{--<div class="panel-body">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.--}}
                                {{--</div><!--panel-body-->--}}
                            {{--</div><!--panel-->--}}
                        {{--</div><!--col-md-4-->--}}

                        {{--<div class="col-md-8 col-md-pull-4">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-12">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-heading">--}}
                                            {{--<h4>Item</h4>--}}
                                        {{--</div><!--panel-heading-->--}}

                                        {{--<div class="panel-body">--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>--}}
                                        {{--</div><!--panel-body-->--}}
                                    {{--</div><!--panel-->--}}
                                {{--</div><!--col-xs-12-->--}}
                            {{--</div><!--row-->--}}

                            {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-heading">--}}
                                            {{--<h4>Item</h4>--}}
                                        {{--</div><!--panel-heading-->--}}

                                        {{--<div class="panel-body">--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>--}}
                                        {{--</div><!--panel-body-->--}}
                                    {{--</div><!--panel-->--}}
                                {{--</div><!--col-md-6-->--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-heading">--}}
                                            {{--<h4>Item</h4>--}}
                                        {{--</div><!--panel-heading-->--}}

                                        {{--<div class="panel-body">--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>--}}
                                        {{--</div><!--panel-body-->--}}
                                    {{--</div><!--panel-->--}}
                                {{--</div><!--col-md-6-->--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-heading">--}}
                                            {{--<h4>Item</h4>--}}
                                        {{--</div><!--panel-heading-->--}}

                                        {{--<div class="panel-body">--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>--}}
                                        {{--</div><!--panel-body-->--}}
                                    {{--</div><!--panel-->--}}
                                {{--</div><!--col-md-6-->--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="panel panel-default">--}}
                                        {{--<div class="panel-heading">--}}
                                            {{--<h4>Item</h4>--}}
                                        {{--</div><!--panel-heading-->--}}

                                        {{--<div class="panel-body">--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>--}}
                                        {{--</div><!--panel-body-->--}}
                                    {{--</div><!--panel-->--}}
                                {{--</div><!--col-md-6-->--}}

                            {{--</div><!--row-->--}}

                        {{--</div><!--col-md-8-->--}}

                    {{--</div><!--row-->--}}

                {{--</div><!--panel body-->--}}

            {{--</div><!-- panel -->--}}

        {{--</div><!-- col-md-10 -->--}}

    </div><!-- row -->
@endsection