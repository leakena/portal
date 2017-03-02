<div class="contact-container container-block">
    <h2 class="container-block-title section-title">Contact</h2>
    @if(isset($resume))
        <ul class="list-unstyled contact-list">
            @foreach($resume->contacts as $contact)

                <li class="email">
                    <i class="fa {{ $contact->icon }}"></i>
                    <a href="{{ $contact->link }}"> {{ $contact->description }}</a>
                </li>

            @endforeach
        </ul>
    @endif
</div><!--//contact-container-->