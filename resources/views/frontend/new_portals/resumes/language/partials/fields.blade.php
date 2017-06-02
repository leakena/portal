<input type="hidden"
       class="language_resume_id"
       name="language_resume_id"
       value="{{ $selectedLanguage->language_resume_id }}">
<input type="hidden"
       class="language_id"
       name="language_id"
       value="{{ $selectedLanguage->language_id }}">
<input type="hidden"
       class="proficiency1"
       name="proficiency"
       value="{{ $selectedLanguage->proficiency }}">


<div class="circle margin-bottom-20" id="{{$selectedLanguage->language_id}}"></div>
<h3 class="heading-xs name">
    <span class="language_name">{{ $selectedLanguage->name }}</span>
    <input type="hidden" class="proficiency" value="{{ $selectedLanguage->proficiency }}">
    @if( $selectedLanguage-> is_mother_tongue == true)
        <span title="Mother Tongue" class="mark">(MT)</span>
    @endif
</h3>



