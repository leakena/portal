@extends('frontend.layouts.app')

@section('content')
	<div class="row">
		{{-- main content --}}
		<div class="col-md-12">
			<div class="wrapper">

				<div class="sidebar-wrapper">

					@include('frontend.partials.resumes.profile')

					@include('frontend.partials.resumes.contact')

					@include('frontend.partials.resumes.education')

					@include('frontend.partials.resumes.languages')

					@include('frontend.partials.resumes.interests')

				</div><!--//sidebar-wrapper-->

				<div class="main-wrapper">

					@include('frontend.partials.resumes.summary-section')

					@include('frontend.partials.resumes.experiences-section')

					@include('frontend.partials.resumes.project-section')

					@include('frontend.partials.resumes.skills-section')

				</div><!--//main-body-->
			</div>
		</div>
	</div>
@endsection