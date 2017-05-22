<div class="col-md-12">
    @if(isset($unpublished_post))
        @foreach($unpublished_post as $unplublish)
            @if($unplublish->file == null)
                <div class="post">
                    <span class="poster">{{ $unplublish->user->name }}</span><br/>
                    <span class="text-muted">
                            <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                        on {{ $unplublish->updated_at->diffForHumans() }}
                        @if($unplublish->published == false)
                            <a href="{{ route('frontend.portal.publish', $unplublish->id) }}" type="button" class="btn btn-link">Publish now</a>
                        @endif
            </span><br/>
                    <p>
                        {!! str_limit($unplublish->body, 270) !!}
                        <span>
                                            <a href="/posts/show/{{ $unplublish->id }}"> See more</a>
                                        </span>
                    </p>
                    <div class="react">
                        <button type="button" class="btn btn-default btn-xs"><i
                                    class="fa fa-thumbs-o-up"></i> Like
                        </button>
                        45 likes, {{ count($unplublish->views)}} Views
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
                        @if(auth()->id() == $unplublish->user->id)
                            <li><a href="/posts/edit/{{ $unplublish->id }}">Edit</a></li>
                            <li><a href="/posts/hide/{{ $unplublish->id }}">Hide</a></li>
                            <li><a href="/posts/delete/{{ $unplublish->id }}">Delete</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                        @else
                            <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                        @endif
                    </ul>
                </span>
                    </div>
                </div>
            @else

                @if(str_contains($unplublish->file, '.pdf') || str_contains($unplublish->file, '.ppt'))
                    <div class="post">
                        <span class="poster">{{ $unplublish->user->name }}</span><br/>
                        <span class="text-muted">
                    @if($unplublish->published == false)
                                <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                            @else
                                <i class="fa fa-globe" aria-hidden="true"> Published</i>
                            @endif
                            on {{ $unplublish->created_at->diffForHumans() }}
                </span><br/>
                        <p>
                            {!! str_limit($unplublish->body, 270) !!}
                            <span>
                                            <a href="/posts/show/{{ $unplublish->id }}"> See more</a>
                                        </span>
                        </p>
                        <div class="post-file">
                            <ul class="item-file">
                                <li class="icon-file"><i class="fa fa-file-pdf-o"></i></li>
                                <li>
                                    {{ $unplublish->file }}
                                    <div class="btn-group">
                                        <a href="{{ asset('docs') }}/{{ $unplublish->file }}" target="_blank">
                                            <button class="btn btn-default btn-xs">Preview</button>
                                        </a>
                                        <a href="{{ asset('docs') }}/{{ $unplublish->file }}" download="{{ $unplublish->file }}">
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
                            45 likes, {{ count($unplublish->views)}} Views
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
                            @if(auth()->id() == $unplublish->user->id)
                                <li><a href="/posts/edit/{{ $unplublish->id }}">Edit</a></li>
                                <li><a href="/posts/hide/{{ $unplublish->id }}">Hide</a></li>
                                <li><a href="/posts/delete/{{ $unplublish->id }}">Delete</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                            @else
                                <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                            @endif
                        </ul>
                    </span>
                        </div>
                    </div>

                @else
                    <div class="post">
                        <a href="/posts/show/{{ $unplublish->id }}">
                            <div class="thumb"
                                 style="background-image: url('{{ asset('img/frontend/uploads/images/'.$unplublish->file) }}')"></div>
                        </a>
                        <div class="desc">
                            <span class="poster">{{ $unplublish->user->name }}</span><br/>
                            <span class="text-muted">
                        @if($unplublish->published == false)
                                    <i class="fa fa-lock" aria-hidden="true"> Unpublished</i>
                                @else
                                    <i class="fa fa-globe" aria-hidden="true"> Published</i>
                                @endif
                                on {{ $unplublish->updated_at->diffForHumans() }}
                                @if($unplublish->published == false)
                                    <a href="{{ route('frontend.portal.publish', $unplublish->id) }}" type="button"
                                       class="btn btn-link">Publish now</a>
                                @endif
                    </span><br/>
                            <p>
                                {!! str_limit($unplublish->body, 220) !!}
                                <span>
                                            <a href="/posts/show/{{ $unplublish->id }}"> See more</a>
                                        </span>
                            </p>
                            <div class="react">
                                <button type="button" class="btn btn-default btn-xs"><i
                                            class="fa fa-thumbs-o-up"></i> Like
                                </button>
                                45 likes, {{ count($unplublish->views)}} Views
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
                                                @if(auth()->id() == $unplublish->user->id)
                                                    <li><a href="/posts/edit/{{ $unplublish->id }}">Edit</a></li>
                                                    <li><a href="/posts/hide/{{ $unplublish->id }}">Hide</a></li>
                                                    <li><a href="/posts/delete/{{ $unplublish->id }}">Delete</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                                                @else
                                                    <li><a href="/posts/report/{{ $unplublish->id }}">Report</a></li>
                                                @endif
                                            </ul>
                                        </span>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                @endif

            @endif
        @endforeach
    @endif
</div>