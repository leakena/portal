<div class="education-container container-block">
    <h2 class="container-block-title section-title">Education</h2>

    @foreach($resume->educations as $education)

        <div class="item">
            <h4 class="degree">{{ $education->major }}</h4>
            <h5 class="meta">{{ $education->school }}</h5>
            <div class="time">{{ $education->start_date }}</div>
        </div><!--//item-->

    @endforeach
</div><!--//education-container-->