<div class="interests-container container-block">
    <h2 class="container-block-title section-title">Interests</h2>
    <ul class="list-unstyled interests-list">
        @foreach($resume->interests as $interest)

            <li>{{ $interest->name }}</li>

        @endforeach
    </ul>
</div><!--//interests-->