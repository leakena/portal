<ul role="tablist" class="nav nav-tabs">
    <li role="presentation" class="active" ><a href="#career_profile" aria-controls="career_profile"
                                              role="tab" data-toggle="tab"
                                              aria-expanded="strue"> {{trans('resume.resume.career_profile')}}</a></li>
    @if(isset($resume))
        <li role="presentation" class=""><a href="#experiences" id="experience" @if(isset($resume)) resume_id = "{{$resume->id}}" @endif aria-controls="experiences" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.experiences') }}</a>
        </li>
        <li role="presentation" class=""><a href="#project" aria-controls="project" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.projects') }}</a>
        </li>
        <li role="presentation" class=""><a href="#skill" aria-controls="skill" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.skills') }}</a>
        </li>
        <li role="presentation" class=""><a href="#contact" aria-controls="contact" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.contact') }}</a>
        </li>
        <li role="presentation" class=""><a href="#education" aria-controls="education" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.education') }}</a>
        </li>
        <li role="presentation" class=""><a href="#languages" aria-controls="languages" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.languages') }}</a>
        </li>
        <li role="presentation" class=""><a href="#interests" aria-controls="interests" role="tab"
                                            data-toggle="tab" aria-expanded="false">{{ trans('labels.frontend.resume.interests') }}</a>
        </li>
    @endif
</ul>