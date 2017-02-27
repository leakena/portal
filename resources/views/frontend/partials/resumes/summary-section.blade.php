<section class="section summary-section">

    <h2 class="section-title">
        <i class="fa fa-user"></i>{{ trans('labels.frontend.resume.career_profile') }}
    </h2>
    <div class="summary">
        <p>{!! $resume->career_profile !!}</p>
    </div><!--//summary-->

    @include('frontend.partials.modals.modal')
</section><!--//section-->