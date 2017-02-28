<section class="section experiences-section">
    <h2 class="section-title">
        <i class="fa fa-briefcase"></i>{{ trans('labels.frontend.resume.experiences') }}
    </h2>
    @foreach($resume->experiences as $experience)

        <div class="item">
            <div class="meta">
                <div class="upper-row">
                    <h3 class="job-title">{{ $experience->position }}</h3>
                    <div class="time">{{ $experience->start_date }}</div>
                </div><!--//upper-row-->
                <div class="company">{{ $experience->company }}</div>
            </div><!--//meta-->
            <div class="details">
                <p>{{ $experience->description }}</p>
            </div><!--//details-->
        </div><!--//item-->

    @endforeach
</section><!--//section-->