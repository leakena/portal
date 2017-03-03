<section class="skills-section section">
    <h2 class="section-title">
        <i class="fa fa-rocket"></i> {{ trans('labels.frontend.resume.skills') }}
    </h2>
    @if(isset($resume))
		<div class="skillset">
			@foreach($resume->skills as $skill)

				<div class="item">
					<h3 class="level-title">{{ $skill->name }}</h3>
					<div class="level-bar">
						<div class="level-bar-inner" data-level="98%">
						</div>
					</div><!--//level-bar-->
				</div><!--//item-->

			@endforeach
		</div>
	@endif
</section><!--//skills-section-->