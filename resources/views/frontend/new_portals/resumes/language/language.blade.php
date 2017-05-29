


    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.resume.store_language') }}" method="post" enctype="multipart/form-data"
              id="sky-form1" class="sky-form" novalidate="novalidate">
            <header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle_language"
                       href="#id_language_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"
                                                                                        id="add"> </i> </a>
                <div style="font-size: 14px; margin-left: -30px">Create Your Language</div>
            </header>
            <div id="id_language_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.language.partials.create_edit_fields')
                    <footer>
                        <button type="submit" class="btn-u pull-left save" style="margin-left: -50px">Save</button>
                        <div class="progress"></div>
                    </footer>
                </fieldset>
            </div>
        </form>
    </div>

    <div class="panel panel-profile">
        <div class="panel-heading overflow-h">
            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Languages </h2>
        </div>
        <div class="panel-body">
            <div class="row" id="mab">
                @if(count($selectedLanguages)>0)
                    @foreach($selectedLanguages as $key => $selectedLanguage)

                        <div class="p-chart col-sm-4 col-xs-4 sm-margin-bottom-10">
                            @include('frontend.new_portals.resumes.language.partials.action')

                            @include('frontend.new_portals.resumes.language.partials.fields')

                        </div>

                    @endforeach
                @else
                    <span class="no_have">There is no language please click on button add to add language</span>
                @endif
            </div>
        </div>
    </div>

    @include('frontend.new_portals.resumes.language.partials.modal')



