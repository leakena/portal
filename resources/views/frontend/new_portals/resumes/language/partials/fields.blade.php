
<input type="hidden" class="language_resume_id" name="language_resume_id" value="{{ $selectedLanguage->language_resume_id }}">


    <div class="circle margin-bottom-20" id="{{$selectedLanguage->language_id}}"></div>
    <h3 class="heading-xs">{{ $selectedLanguage->name }}
        @if( $selectedLanguage-> proficiency == 'Mother Tongue')
            (Mother Tongue)
        @endif
    </h3>

    @if($key == count($selectedLanguages)-1)
        <div class="lan col-sm-4"></div>
    @endif


