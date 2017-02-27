@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        {{-- main content --}}
        <div class="col-xs-8">
            <div class="row">
                {{-- Schedule --}}
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Schedule</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Default</td>
                                        <td>Defaultson</td>
                                        <td>def@somemail.com</td>
                                    </tr>
                                    <tr class="success">
                                        <td>Success</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>Danger</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr class="info">
                                        <td>Info</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>Warning</td>
                                        <td>Refs</td>
                                        <td>bo@example.com</td>
                                    </tr>
                                    <tr class="active">
                                        <td>Active</td>
                                        <td>Activeson</td>
                                        <td>act@example.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--Events--}}
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Upcoming Events</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Event title</th>
                                        <th>Start Date</th>
                                        <th>Duration</th>
                                        <th>Place</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<5; $i++)
                                        <tr>
                                            <td><a href="#">Laracast</a></td>
                                            <td>01-03-2017</td>
                                            <td><span class="label label-info">3 Days</span></td>
                                            <td>
                                                <i class="fa fa-map-marker"></i>
                                                ITC, F-309
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a class="btn btn-sm btn-default btn-flat pull-right">View All Events</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
                {{--Alert Message--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-warning"></i>

                            <h3 class="box-title">Alerting Message</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                Danger alert preview. This alert is dismissable. A wonderful serenity has taken
                                possession of my entire
                                soul, like these sweet mornings of spring which I enjoy with my whole heart.
                            </div>
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                                Info alert preview. This alert is dismissable.
                            </div>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                Warning alert preview. This alert is dismissable.
                            </div>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                Success alert preview. This alert is dismissable.
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-md-4" id="side-right">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Post</h3>
                        </div>
                        <div class="box-body">
                            @foreach($posts as $post)
                                <div class="side-right">
                                    <div class="side-thumb">
                                        <a href="/posts/show/{{ $post->id }}">
                                            <img src="{{ asset('img/frontend/uploads/images/'.$post->file) }}"
                                                 class="img-responsive" title="title-posts"/>
                                        </a>
                                    </div>
                                    <div class="side-desc">
                                        <a href="/posts/show/{{ $post->id }}">
                                            <article>{!! str_limit($post->body, 60) !!}</article>
                                        </a>
                                        <p class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                            <div class="side-footer">
                                <a href="/posts">See all posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        @for($i=0; $i<=3; $i++)

            <div class="col-md-3">
                <div class="card">
                    <div class="card-img-top" style="background-image: url('{{ asset('img/books.jpg') }}')" alt="Card image cap"></div>
                    <div class="card-block">
                        <h4 class="card-title">Book title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-xs">More Details</a>
                    </div>
                </div>
            </div>

        @endfor
    </div>

    {{--LMS Integration--}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">E-Learning Assigment</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Start Date</th>
                                <th>Due date</th>
                                <th>Time remaining</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0; $i<5; $i++)
                                <tr>
                                    <td><a href="#">Image Processing</a></td>
                                    <td>01 Janury 2016</td>
                                    <td>Friday, 25 November 2016, 7:00 PM</td>
                                    <td><span class="label label-success">Assignment was submitted 2 days 21 hours early</span></td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
                        Assignments</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
@endsection