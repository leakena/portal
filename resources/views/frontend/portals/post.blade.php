<div class="col-md-12">
    @if($post->file == null)
        <div class="post">
            <span class="poster">{{ $post->user->name }}</span><br/>
            <span class="text-muted">
                @if($post->published == false)
                    <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                @else
                    <i class="fa fa-globe" aria-hidden="true"> Published</i>
                @endif
                on {{ $post->updated_at->diffForHumans() }}
                @if($post->published == false)
                    <a href="{{ route('frontend.portal.publish', $post->id) }}" type="button" class="btn btn-link">Publish now</a>
                @endif
            </span><br/>
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
        </div>
    @else

        @if(str_contains($post->file, '.pdf') || str_contains($post->file, '.ppt'))
            <div class="post">
                <span class="poster">{{ $post->user->name }}</span><br/>
                <span class="text-muted">
                    @if($post->published == false)
                        <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                    @else
                        <i class="fa fa-globe" aria-hidden="true"> Published</i>
                    @endif
                    on {{ $post->created_at->diffForHumans() }}
                </span><br/>
                <p>
                    {!! str_limit($post->body, 270) !!}
                    <span>
                                            <a href="/posts/show/{{ $post->id }}"> See more</a>
                                        </span>
                </p>
                <div class="post-file">
                    <ul class="item-file">
                        <li class="icon-file"><i class="fa fa-file-pdf-o"></i></li>
                        <li>
                            {{ $post->file }}
                            <div class="btn-group">
                                <a href="{{ asset('docs') }}/{{ $post->file }}" target="_blank">
                                    <button class="btn btn-default btn-xs">Preview</button>
                                </a>
                                <a href="{{ asset('docs') }}/{{ $post->file }}" download="{{ $post->file }}">
                                    <button class="btn btn-default btn-xs">
                                        Download
                                    </button>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="react">
                    <button type="button" class="btn btn-default btn-xs"><i
                                class="fa fa-thumbs-o-up"></i> Like
                    </button>
                    45 likes, {{ count($post->views)}} Views
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
            </div>

        @else
            <div class="post">
                <a href="/posts/show/{{ $post->id }}">
                    <div class="thumb"
                         style="background-image: url('{{ asset('img/frontend/uploads/images/'.$post->file) }}')"></div>
                </a>
                <div class="desc">
                    <span class="poster">{{ $post->user->name }}</span><br/>
                    <span class="text-muted">
                        @if($post->published == false)
                            <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                        @else
                            <i class="fa fa-globe" aria-hidden="true"> Published</i>
                        @endif
                        on {{ $post->updated_at->diffForHumans() }}
                        @if($post->published == false)
                            <a href="{{ route('frontend.portal.publish', $post->id) }}" type="button"
                               class="btn btn-link">Publish now</a>
                        @endif
                    </span><br/>
                    <p>
                        {!! str_limit($post->body, 220) !!}
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
        @endif

    @endif

</div>