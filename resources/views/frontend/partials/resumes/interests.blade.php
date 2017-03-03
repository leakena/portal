<div class="interests-container container-block">
    <h2 class="container-block-title section-title">{{ trans('resume.resume.interests') }}</h2>
    @if(isset($resume))
        <ul class="list-unstyled interests-list">
            @foreach($resume->interests as $interest)

                <li>{{ $interest->name }}</li>

            @endforeach
        </ul>
    @endif
</div><!--//interests-->