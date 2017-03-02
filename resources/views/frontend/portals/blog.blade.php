@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{--section content--}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">What're you thinking?</h3>
                            </div>
                            <div class="box-body">
                                <form method="POST" action="{{ url('/posts/store') }}" enctype="multipart/form-data"
                                      files="true" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea id="body_post" class="form-control" role="8" rows="4" name="body"
                                                  id="body"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="published">
                                            <input type="checkbox" name="published" id="published" checked> Published
                                            now
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="file" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @foreach($posts as $post)

                        <div class="col-md-12">
                            <div class="post">
                                <a href="/posts/show/{{ $post->id }}">
                                    <div class="thumb"
                                         style="background-image: url('{{ asset('img/frontend/uploads/images/'.$post->file) }}')"></div>
                                </a>
                                <div class="desc">
                                    <span class="poster">{{ $post->user->name }}</span><br/>
                                    <span class="text-muted">Posted on {{ $post->created_at->diffForHumans() }}</span><br/>
                                    <p>
                                        {!! str_limit($post->body, 270) !!}
                                        <span>
                                            <a href="/posts/show/{{ $post->id }}"> See more</a>
                                        </span>
                                    </p>
                                    <div class="react">
                                        <button type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-thumbs-o-up"></i> Like
                                        </button>
                                        45 likes, {{ count($post->views)}} Views
                                    </div>
                                </div>
                                <div class="option">
                                    <span class="dropdown">
                                        <span class="btn btn-box-tool dropdown-toggle" type="button"
                                              id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="true" data-toggle="tooltip" title=""
                                              data-widget="chat-pane-toggle" data-original-title="Setting">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            @if(auth()->id() == $post->user->id)
                                                <li><a href="/posts/edit/{{ $post->id }}">Edit</a></li>
                                                <li><a href="/posts/hide/{{ $post->id }}">Hide</a></li>
                                                <li><a href="/posts/delete/{{ $post->id }}">Delete</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="/posts/report/{{ $post->id }}">Report</a></li>
                                            @else
                                                <li><a href="/posts/report/{{ $post->id }}">Report</a></li>
                                            @endif
                                        </ul>
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            {{--section side bar--}}
            <div class="col-md-4" id="side-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-body">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="{{ asset('img/icon.png') }}"
                                                 alt="Profile picture" style="width: 60px; height: 60px;">
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
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4>Sidebar Item</h4>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti
                                expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4>Sidebar Item</h4>
                            </div>
                            <div class="box-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti
                                expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->
@endsection