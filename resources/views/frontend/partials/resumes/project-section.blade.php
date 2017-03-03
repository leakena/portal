<section class="section projects-section">
    <h2 class="section-title">
        <i class="fa fa-archive"></i>{{ trans('labels.frontend.resume.projects') }}
    </h2>

    @if(isset($resume))
        @foreach($resume->projects as $project)

            <div class="item">
            <span class="project-title">
                <a href="#hook">{{ $project->name }}</a>
            </span> -
                <span class="project-tagline">
                    <p class="text-justify">
                        {{ $project->description }}
                    </p>
                </span>
            </div><!--//item-->

        @endforeach
    @endif

</section><!--//section-->