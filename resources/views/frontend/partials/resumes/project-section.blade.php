<section class="section projects-section">
    <h2 class="section-title">
        <i class="fa fa-archive"></i>Projects
    </h2>

    @if(isset($resume))
        @foreach($resume->projects as $project)

            <div class="item">
            <span class="project-title">
                <a href="#hook">{{ $project->name }}</a>
            </span> -
                <span class="project-tagline">{{ $project->description }}</span>
            </div><!--//item-->

        @endforeach
    @endif

</section><!--//section-->