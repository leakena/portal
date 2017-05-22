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
                                {!! Form::open(['enctype'=> 'multipart/form-data', 'files' => true, 'url' => '/posts/store', 'method' => 'post', 'id' => 'create-post']) !!}

                                    <div class="form-group">
                                        <textarea id="body_post" class="form-control" role="8" rows="4" name="body"
                                                  id="post_body"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input class="filestyle" id="myFile" type="file" name="file" data-buttonBefore="true"
                                                   accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            {!! Form::submit( 'Publish', ['class' => 'btn btn-info', 'name' => 'btn_submit', 'value' => 'publish'])!!}

                                            {!! Form::submit( 'Draft', ['class' => 'btn btn-primary', 'name' => 'btn_submit', 'value' => 'draft']) !!}
                                        </div>
                                    </div>


                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @include('frontend.portals.unpublished')

                    @foreach($posts as $post)

                        @include('frontend.portals.post')

                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                       {{-- {{ $posts_->links() }}--}}

                       {{-- <div class="col-md-12">
                            <ul class="pagination">
                                <li class="disabled"><span>«</span></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="http://localhost:8000/posts?page=2">2</a></li>
                                <li><a href="http://localhost:8000/posts?page=2" rel="next">»</a></li>
                            </ul>
                        </div>--}}
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
            $('#myFile').change(function () {
                var dom = $(this);
                if(this.files[0].size > 5000000){
                    swal({
                        title: "You cannot upload file bigger than 5M",
                        type: "warning"
                    });
                    dom.val('');
                }

            });

            $('input[name=btn_submit]').on('click', function(e){

                if(tinyMCE.activeEditor.getContent() == '' && $('#myFile').val() == ''){
                    swal({
                        title: "You need to write some text or upload a file",
                        type: "warning"
                    });
                    e.preventDefault();
                }
            });

            $(":file").filestyle({buttonName: "btn-primary"});

        });


    </script>

@endsection

