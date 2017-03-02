<ul role="tablist" class="nav nav-tabs">
    <li role="presentation" class="active" ><a href="#career_profile" aria-controls="career_profile"
                                              role="tab" data-toggle="tab"
                                              aria-expanded="strue">Career Profile</a></li>
    <li role="presentation" class=""><a href="#experiences" id="experience" @if(isset($resume)) resume_id = "{{$resume->id}}" @endif aria-controls="experiences" role="tab"
                                        data-toggle="tab" aria-expanded="false">Experiences</a>
    </li>
    <li role="presentation" class=""><a href="#project" aria-controls="project" role="tab"
                                        data-toggle="tab" aria-expanded="false">Projects</a>
    </li>
    <li role="presentation" class=""><a href="#skill" aria-controls="skill" role="tab"
                                        data-toggle="tab" aria-expanded="false">Skills</a>
    </li>
    <li role="presentation" class=""><a href="#contact" aria-controls="contact" role="tab"
                                        data-toggle="tab" aria-expanded="false">Contact</a>
    </li>
    <li role="presentation" class=""><a href="#education" aria-controls="education" role="tab"
                                        data-toggle="tab" aria-expanded="false">Education</a>
    </li>
    <li role="presentation" class=""><a href="#languages" aria-controls="languages" role="tab"
                                        data-toggle="tab" aria-expanded="false">Languages</a>
    </li>
    <li role="presentation" class=""><a href="#interests" aria-controls="interests" role="tab"
                                        data-toggle="tab" aria-expanded="false">Interests</a>
    </li>
</ul>