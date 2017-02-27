@extends('frontend.layouts.app')

@section('content')
	<div class="row">
		{{-- main content --}}
		<div class="col-md-12">
			<div class="wrapper">
				<div class="sidebar-wrapper">
					<div class="profile-container">
						<img class="profile" src="{{ asset('img/icon.png') }}" alt="" style="with:100px;height:100px;"/>
						<h1 class="name">Alan Doe</h1>
						<h3 class="tagline">Full Stack Developer</h3>
					</div><!--//profile-container-->

					<div class="contact-container container-block">
						<ul class="list-unstyled contact-list">
							<li class="email"><i class="fa fa-envelope"></i><a href="mailto: yourname@email.com">alan.doe@website
									.com</a></li>
							<li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789">0123 456 789</a>
							</li>
							<li class="website"><i class="fa fa-globe"></i><a
										href="http://themes.3rdwavemedia.com/website-templates/free-responsive-website-template-for-developers/"
										target="_blank">portfoliosite.com</a></li>
							<li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/in/alandoe</a>
							</li>
							<li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a>
							</li>
							<li class="twitter"><i class="fa fa-twitter"></i><a
										href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>
						</ul>
					</div><!--//contact-container-->
					<div class="education-container container-block">
						<h2 class="container-block-title">Education</h2>
						<div class="item">
							<h4 class="degree">MSc in Computer Science</h4>
							<h5 class="meta">University of London</h5>
							<div class="time">2011 - 2012</div>
						</div><!--//item-->
						<div class="item">
							<h4 class="degree">BSc in Applied Mathematics</h4>
							<h5 class="meta">Bristol University</h5>
							<div class="time">2007 - 2011</div>
						</div><!--//item-->
					</div><!--//education-container-->

					<div class="languages-container container-block">
						<h2 class="container-block-title">Languages</h2>
						<ul class="list-unstyled interests-list">
							<li>English <span class="lang-desc">(Native)</span></li>
							<li>French <span class="lang-desc">(Professional)</span></li>
							<li>Spanish <span class="lang-desc">(Professional)</span></li>
						</ul>
					</div><!--//interests-->

					<div class="interests-container container-block">
						<h2 class="container-block-title">Interests</h2>
						<ul class="list-unstyled interests-list">
							<li>Climbing</li>
							<li>Snowboarding</li>
							<li>Cooking</li>
						</ul>
					</div><!--//interests-->

				</div><!--//sidebar-wrapper-->

				<div class="main-wrapper">

					<section class="section summary-section">
						<h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
						<div class="summary">
							<p>Summarise your career here lorem ipsum dolor sit amet, consectetuer adipiscing elit. You
								can
								<a href="http://themes.3rdwavemedia.com/website-templates/orbit-free-resume-cv-template-for-developers/"
								   target="_blank">download this free resume/CV template here</a>. Aenean commodo ligula
								eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</p>
						</div><!--//summary-->
					</section><!--//section-->

					<section class="section experiences-section">
						<h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

						<div class="item">
							<div class="meta">
								<div class="upper-row">
									<h3 class="job-title">Lead Developer</h3>
									<div class="time">2015 - Present</div>
								</div><!--//upper-row-->
								<div class="company">Startup Hubs, San Francisco</div>
							</div><!--//meta-->
							<div class="details">
								<p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
									magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
									nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede
									justo.</p>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
									laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
									architecto beatae vitae dicta sunt explicabo. </p>
							</div><!--//details-->
						</div><!--//item-->

						<div class="item">
							<div class="meta">
								<div class="upper-row">
									<h3 class="job-title">Senior Software Engineer</h3>
									<div class="time">2014 - 2015</div>
								</div><!--//upper-row-->
								<div class="company">Google, London</div>
							</div><!--//meta-->
							<div class="details">
								<p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
									magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
									nec, pellentesque eu, pretium quis, sem.</p>

							</div><!--//details-->
						</div><!--//item-->

						<div class="item">
							<div class="meta">
								<div class="upper-row">
									<h3 class="job-title">UI Developer</h3>
									<div class="time">2012 - 2014</div>
								</div><!--//upper-row-->
								<div class="company">Amazon, London</div>
							</div><!--//meta-->
							<div class="details">
								<p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
									magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
									nec, pellentesque eu, pretium quis, sem.</p>
							</div><!--//details-->
						</div><!--//item-->

					</section><!--//section-->

					<section class="section projects-section">
						<h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
						<div class="intro">
							<p>You can list your side projects or open source libraries in this section. Lorem ipsum
								dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum
								fringilla a eu lectus.</p>
						</div><!--//intro-->
						<div class="item">
							<span class="project-title"><a href="#hook">Velocity</a></span> - <span
									class="project-tagline">A responsive website template designed to help startups promote, market and sell their products.</span>

						</div><!--//item-->
						<div class="item">
							<span class="project-title"><a
										href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-web-development-agencies-devstudio/"
										target="_blank">DevStudio</a></span> -
							<span class="project-tagline">A responsive website template designed to help web developers/designers market their services. </span>
						</div><!--//item-->
						<div class="item">
							<span class="project-title"><a
										href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-startups-tempo/"
										target="_blank">Tempo</a></span> - <span class="project-tagline">A responsive website template designed to help startups promote their products or services and to attract users &amp; investors</span>
						</div><!--//item-->
						<div class="item">
							<span class="project-title"><a
										href="hhttp://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-mobile-apps-atom/"
										target="_blank">Atom</a></span> - <span class="project-tagline">A comprehensive website template solution for startups/developers to market their mobile apps. </span>
						</div><!--//item-->
						<div class="item">
							<span class="project-title"><a
										href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-mobile-apps-delta/"
										target="_blank">Delta</a></span> - <span class="project-tagline">A responsive Bootstrap one page theme designed to help app developers promote their mobile apps</span>
						</div><!--//item-->
					</section><!--//section-->

					<section class="skills-section section">
						<h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
						<div class="skillset">
							<div class="item">
								<h3 class="level-title">Python &amp; Django</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="98%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

							<div class="item">
								<h3 class="level-title">Javascript &amp; jQuery</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="98%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

							<div class="item">
								<h3 class="level-title">Angular</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="98%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

							<div class="item">
								<h3 class="level-title">HTML5 &amp; CSS</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="95%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

							<div class="item">
								<h3 class="level-title">Ruby on Rails</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="85%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

							<div class="item">
								<h3 class="level-title">Sketch &amp; Photoshop</h3>
								<div class="level-bar">
									<div class="level-bar-inner" data-level="60%">
									</div>
								</div><!--//level-bar-->
							</div><!--//item-->

						</div>
					</section><!--//skills-section-->
				</div><!--//main-body-->
			</div>
		</div>


		{{--<div class="col-xs-8">--}}
		{{--<div class="row">--}}
		{{-- Schedule --}}
		{{--<div class="col-md-12">--}}
		{{--<div class="box box-primary">--}}
		{{--<div class="box-header with-border">--}}
		{{--<h3 class="box-title">Schedule</h3>--}}

		{{--<div class="box-tools pull-right">--}}
		{{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i--}}
		{{--class="fa fa-minus"></i>--}}
		{{--</button>--}}
		{{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i--}}
		{{--class="fa fa-times"></i></button>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--<div class="box-body">--}}
		{{--<div class="table-responsive">--}}
		{{--<table class="table">--}}
		{{--<thead>--}}
		{{--<tr>--}}
		{{--<th>Firstname</th>--}}
		{{--<th>Lastname</th>--}}
		{{--<th>Email</th>--}}
		{{--</tr>--}}
		{{--</thead>--}}
		{{--<tbody>--}}
		{{--<tr>--}}
		{{--<td>Default</td>--}}
		{{--<td>Defaultson</td>--}}
		{{--<td>def@somemail.com</td>--}}
		{{--</tr>--}}
		{{--<tr class="success">--}}
		{{--<td>Success</td>--}}
		{{--<td>Doe</td>--}}
		{{--<td>john@example.com</td>--}}
		{{--</tr>--}}
		{{--<tr class="danger">--}}
		{{--<td>Danger</td>--}}
		{{--<td>Moe</td>--}}
		{{--<td>mary@example.com</td>--}}
		{{--</tr>--}}
		{{--<tr class="info">--}}
		{{--<td>Info</td>--}}
		{{--<td>Dooley</td>--}}
		{{--<td>july@example.com</td>--}}
		{{--</tr>--}}
		{{--<tr class="warning">--}}
		{{--<td>Warning</td>--}}
		{{--<td>Refs</td>--}}
		{{--<td>bo@example.com</td>--}}
		{{--</tr>--}}
		{{--<tr class="active">--}}
		{{--<td>Active</td>--}}
		{{--<td>Activeson</td>--}}
		{{--<td>act@example.com</td>--}}
		{{--</tr>--}}
		{{--</tbody>--}}
		{{--</table>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}

		{{--<div class="row">--}}
		{{--Events--}}
		{{--<div class="col-md-12">--}}
		{{--<div class="box box-primary">--}}
		{{--<div class="box-header with-border">--}}
		{{--<h3 class="box-title">Upcoming Events</h3>--}}

		{{--<div class="box-tools pull-right">--}}
		{{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i--}}
		{{--class="fa fa-minus"></i>--}}
		{{--</button>--}}
		{{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i--}}
		{{--class="fa fa-times"></i></button>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--<!-- /.box-header -->--}}
		{{--<div class="box-body">--}}
		{{--<div class="table-responsive">--}}
		{{--<table class="table no-margin">--}}
		{{--<thead>--}}
		{{--<tr>--}}
		{{--<th>Event title</th>--}}
		{{--<th>Start Date</th>--}}
		{{--<th>Duration</th>--}}
		{{--<th>Place</th>--}}
		{{--</tr>--}}
		{{--</thead>--}}
		{{--<tbody>--}}
		{{--@for($i=0; $i<5; $i++)--}}
		{{--<tr>--}}
		{{--<td><a href="#">Laracast</a></td>--}}
		{{--<td>01-03-2017</td>--}}
		{{--<td><span class="label label-info">3 Days</span></td>--}}
		{{--<td>--}}
		{{--<i class="fa fa-map-marker"></i>--}}
		{{--ITC, F-309--}}
		{{--</td>--}}
		{{--</tr>--}}
		{{--@endfor--}}
		{{--</tbody>--}}
		{{--</table>--}}
		{{--</div>--}}
		{{--<!-- /.table-responsive -->--}}
		{{--</div>--}}
		{{--<!-- /.box-body -->--}}
		{{--<div class="box-footer clearfix">--}}
		{{--<a class="btn btn-sm btn-default btn-flat pull-right">View All Events</a>--}}
		{{--</div>--}}
		{{--<!-- /.box-footer -->--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--Alert Message--}}
		{{--<div class="row">--}}
		{{--<div class="col-md-12">--}}
		{{--<div class="box box-primary">--}}
		{{--<div class="box-header with-border">--}}
		{{--<i class="fa fa-warning"></i>--}}

		{{--<h3 class="box-title">Alerting Message</h3>--}}
		{{--</div>--}}
		{{--<!-- /.box-header -->--}}
		{{--<div class="box-body">--}}
		{{--<div class="alert alert-danger alert-dismissible">--}}
		{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
		{{--<h4><i class="icon fa fa-ban"></i> Alert!</h4>--}}
		{{--Danger alert preview. This alert is dismissable. A wonderful serenity has taken--}}
		{{--possession of my entire--}}
		{{--soul, like these sweet mornings of spring which I enjoy with my whole heart.--}}
		{{--</div>--}}
		{{--<div class="alert alert-info alert-dismissible">--}}
		{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
		{{--<h4><i class="icon fa fa-info"></i> Alert!</h4>--}}
		{{--Info alert preview. This alert is dismissable.--}}
		{{--</div>--}}
		{{--<div class="alert alert-warning alert-dismissible">--}}
		{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
		{{--<h4><i class="icon fa fa-warning"></i> Alert!</h4>--}}
		{{--Warning alert preview. This alert is dismissable.--}}
		{{--</div>--}}
		{{--<div class="alert alert-success alert-dismissible">--}}
		{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
		{{--<h4><i class="icon fa fa-check"></i> Alert!</h4>--}}
		{{--Success alert preview. This alert is dismissable.--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--<!-- /.box-body -->--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}

		{{-- Sidebar --}}
		{{--<div class="col-md-4" id="side-right">--}}
		{{--<div class="row">--}}
		{{--<div class="col-md-12">--}}
		{{--<div class="box box-primary">--}}
		{{--<div class="box-header with-border">--}}
		{{--<h3 class="box-title">Recently Post</h3>--}}
		{{--</div>--}}
		{{--<div class="box-body">--}}
		{{--@foreach($posts as $post)--}}
		{{--<div class="side-right">--}}
		{{--<div class="side-thumb">--}}
		{{--<a href="/posts/show/{{ $post->id }}">--}}
		{{--<img src="{{ asset('img/frontend/uploads/images/'.$post->file) }}"--}}
		{{--class="img-responsive" title="title-posts"/>--}}
		{{--</a>--}}
		{{--</div>--}}
		{{--<div class="side-desc">--}}
		{{--<a href="/posts/show/{{ $post->id }}">--}}
		{{--<article>{!! str_limit($post->body, 60) !!}</article>--}}
		{{--</a>--}}
		{{--<p class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</p>--}}
		{{--</div>--}}
		{{--<div class="clearfix"></div>--}}
		{{--</div>--}}
		{{--@endforeach--}}
		{{--<div class="side-footer">--}}
		{{--<a href="/posts">See all posts</a>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--</div>--}}

	</div>

	{{--<div class="row">--}}
	{{--@for($i=0; $i<=3; $i++)--}}

	{{--<div class="col-md-3">--}}
	{{--<div class="card">--}}
	{{--<div class="card-img-top" style="background-image: url('{{ asset('img/books.jpg') }}')" alt="Card image cap"></div>--}}
	{{--<div class="card-block">--}}
	{{--<h4 class="card-title">Book title</h4>--}}
	{{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
	{{--<a href="#" class="btn btn-primary btn-xs">More Details</a>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}

	{{--@endfor--}}
	{{--</div>--}}

	{{--LMS Integration--}}
	{{--<div class="row">--}}
	{{--<div class="col-md-12">--}}
	{{--<div class="box box-primary">--}}
	{{--<div class="box-header with-border">--}}
	{{--<h3 class="box-title">E-Learning Assigment</h3>--}}

	{{--<div class="box-tools pull-right">--}}
	{{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i--}}
	{{--class="fa fa-minus"></i>--}}
	{{--</button>--}}
	{{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>--}}
	{{--</button>--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--<!-- /.box-header -->--}}
	{{--<div class="box-body">--}}
	{{--<div class="table-responsive">--}}
	{{--<table class="table no-margin">--}}
	{{--<thead>--}}
	{{--<tr>--}}
	{{--<th>Course Name</th>--}}
	{{--<th>Start Date</th>--}}
	{{--<th>Due date</th>--}}
	{{--<th>Time remaining</th>--}}
	{{--</tr>--}}
	{{--</thead>--}}
	{{--<tbody>--}}
	{{--@for($i=0; $i<5; $i++)--}}
	{{--<tr>--}}
	{{--<td><a href="#">Image Processing</a></td>--}}
	{{--<td>01 Janury 2016</td>--}}
	{{--<td>Friday, 25 November 2016, 7:00 PM</td>--}}
	{{--<td><span class="label label-success">Assignment was submitted 2 days 21 hours early</span></td>--}}
	{{--</tr>--}}
	{{--@endfor--}}
	{{--</tbody>--}}
	{{--</table>--}}
	{{--</div>--}}
	{{--<!-- /.table-responsive -->--}}
	{{--</div>--}}
	{{--<!-- /.box-body -->--}}
	{{--<div class="box-footer clearfix">--}}
	{{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All--}}
	{{--Assignments</a>--}}
	{{--</div>--}}
	{{--<!-- /.box-footer -->--}}
	{{--</div>--}}
	{{--</div>--}}
	{{--</div>--}}
@endsection