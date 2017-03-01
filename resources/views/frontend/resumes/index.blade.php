@extends('frontend.layouts.app')

@section('content')
	<div class="row">
		{{-- main content --}}
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">My resume</div>
				<div class="panel-body">
					<div role="tabpanel">
						@include('frontend.partials.resumes.tabmenu')
						<div class="tab-content">

							@include('frontend.resumes.career_profile')

							@include('frontend.resumes.experiences')

							@include('frontend.resumes.project')

							@include('frontend.resumes.skill')

							@include('frontend.resumes.contact')

							@include('frontend.resumes.education')

							@include('frontend.resumes.languages')

							@include('frontend.resumes.interest')

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection