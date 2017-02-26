@extends('frontend.layouts.app')

@section('content')
	<div class="row">
		{{-- main content --}}
		<div class="col-xs-8">
			<div class="row">
				{{-- Schedule --}}
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Schedule</h3>

							<div class="box-tools pull-right">
								<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
									<i class="fa fa-comments"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-sprite">
									<tr>
										<th>Time</th>
										<th>Mon</th>
										<th>Tue</th>
										<th>Wed</th>
										<th>Thu</th>
										<th>Fri</th>
										<th>Sat</th>
										<th>Sun</th>
									</tr>
									<tbody>
										@for($i=0; $i<10; $i++)
											<tr>
												<td>7:00 - 9:00</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
												<td  align="right">
													<strong>PI</strong><br/>
													CHUN Thavorac<br/>
													Course
												</td>
											</tr>
										@endfor
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">E-Learning Assigment</h3>

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
										<th>Course Name</th>
										<th>Start Date</th>
										<th>Duration</th>
										<th>Counting</th>
									</tr>
									</thead>
									<tbody>
									@for($i=0; $i<5; $i++)
										<tr>
											<td><a href="pages/examples/invoice.html">Image Processing</a></td>
											<td>01 Janury 2016</td>
											<td><span class="label label-info">7 Days</span></td>
											<td><span class="label label-success">3 days more</span></td>
										</tr>
									@endfor
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">
							{{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> --}}
							<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
								Assigments</a>
						</div>
						<!-- /.box-footer -->
					</div>
				</div>
			</div>

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

		{{-- side bar --}}
		<div class="col-md-4" id="side-right">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
							<ul class="media-list">
								<li class="media">
									<div class="media-left">
										<img class="media-object" src="{{ asset('img/user.jpg') }}"
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
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Recently posts</h3>

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
							<ul class="products-list product-list-in-box">
								@foreach($posts as $post)
									<li class="item">
										<div class="product-img">
											<img src="{{ asset('img/frontend/uploads/images/'.$post->file) }}"
												 alt="Product Image">
										</div>
										<div class="product-info">
											<a href="javascript:void(0)" class="product-title">{{ $post->user->name}}
												<span class="label label-info pull-right">{{ $post->created_at->diffForHumans() }}</span></a>
                        <span class="product-description">
                          {!! str_limit($post->body, 40) !!}
                        </span>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
						<!-- /.box-body -->
						<div class="box-footer text-center">
							<a href="/posts" class="uppercase">View All Posts</a>
						</div>
						<!-- /.box-footer -->
					</div>
				</div>
			</div>
		</div>

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
								<th>Duration</th>
								<th>Counting</th>
							</tr>
							</thead>
							<tbody>
							@for($i=0; $i<5; $i++)
								<tr>
									<td><a href="pages/examples/invoice.html">Image Processing</a></td>
									<td>01 Janury 2016</td>
									<td><span class="label label-info">7 Days</span></td>
									<td><span class="label label-success">3 days more</span></td>
								</tr>
							@endfor
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					{{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> --}}
					<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
						Assigments</a>
				</div>
				<!-- /.box-footer -->
			</div>
		</div>
	</div>
@endsection