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
                                <h3 class="box-title">Updating post</h3>
                            </div>
                            <div class="box-body">
                                <form method="POST" action="{{ url('/posts/update') }}/{{ $post->id }}"
                                      enctype="multipart/form-data" files="true" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea id="body_post" class="form-control" role="8" rows="4"
                                                  name="body">{!! $post->body !!}</textarea>
                                    </div>
                                    @if($post->file)
                                        <div class="post-file">
                                            <ul class="item-file">
                                                <li class="icon-file"><i class="fa fa-file-pdf-o"></i></li>
                                                <li>
                                                <span class="file-name">
                                                    <a href="{{ asset('docs') }}/{{ $post->file }}" target="_blank">
                                                        {{ $post->file }}
                                                    </a>
                                                    <input type="text" name="name" class="form-control hidden"
                                                           value="{{ $post->file }}">
                                                </span>

                                                </li>
                                                <li style="float: right">
                                                    <i class="fa fa-times cross" aria-hidden="true"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="post-file1">
                                            <ul class="item-file">
                                                <li class="icon-file"><i class="fa fa-file-pdf-o"></i></li>
                                                <li>
                                                <span class="file-name">
                                                    <input type="text" class="form-control hidden">

                                                </span>

                                                </li>
                                                <li style="float: right">
                                                    <i class="fa fa-times cross" aria-hidden="true"></i>
                                                </li>
                                            </ul>

                                        </div>

                                    @endif

                                    <div class="row file">
                                        <div class="form-group col-md-6">
                                            <input id="file" type="file" class="filestyle" name="file"
                                                   accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf"
                                                   data-buttonText="Change file" data-badge="false" data-input="false"
                                                   data-value="{{ isset($post->file) ? $post->file : null }}">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('frontend.portal.allPost') }}" type="button"
                                           class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-info update">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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

@section('after-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('.post-file1').hide();
            $(document).on('click', '.cross', function () {
                $('.post-file').hide();
                $('.post-file1').hide();
                $('.buttonText').text('Chose file');
                $('#file').attr('data-input', true);
                $('#file').empty();
                console.log($('#file').val(''))
                $('input[name=name]').remove();
            });

            $(document).on('change', '#file', function () {
                if ($('#file').val() != '') {
                    var fake = 'fakepath';
                    if ($('#file').val().indexOf(fake) != -1) {
                        $('.post-file1').show();
                        $('.post-file').show();
                        var length = $('#file').val().length;
                        var name = $('#file').val().substring(12, length);
                        $('.file-name').text(name);
                    } else {
                        $('.post-file1').show();
                        $('.post-file').show();
                        $('.file-name').text($('#file').val());
                    }
                }
            });

            $('#file').change(function () {
                var dom = $(this);
                if (this.files[0].size > 5000000) {
                    swal({
                        title: "You cannot upload file bigger than 5M",
                        type: "warning"
                    });
                    dom.val('');
                }

            });

            $('.update').on('click', function (e) {

                if (tinyMCE.activeEditor.getContent() == '' && $('#file').val() == '') {
                    swal({
                        title: "You need to write some text or upload a file",
                        type: "warning"
                    });
                    e.preventDefault();
                }
            });

        });

    </script>

@endsection