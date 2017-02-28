<div class="languages-container container-block">
    <h2 class="container-block-title section-title">Languages</h2>
    <ul class="list-unstyled interests-list">

        @foreach($resume->languages as $language)
            <li>{{ $language->name }} <span class="lang-desc">({{ $language->degree }})</span></li>
        @endforeach

    </ul>
</div><!--//interests-->