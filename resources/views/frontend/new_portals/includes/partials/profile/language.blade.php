<div class="panel panel-profile">
    <div class="panel-heading overflow-h">
        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Language</h2>
        <a href="#"><i class="fa fa-cog pull-right"></i></a>
    </div>
    <div class="panel-body">
        <div class="row">
            @if(isset($resume))
                @if($languages = $resume->languages)
                    @foreach($languages as $language)
                        <div class="p-chart col-sm-6 col-xs-6 sm-margin-bottom-10">
                            <div class="circle margin-bottom-20" id="{{ $language->id }}"></div>
                            <h3 class="heading-xs">
                                {{ $language->name }}
                                @if($language->pivot->proficiency == 'Mother Tongue')
                                    (Mother Tongue)
                                @endif
                            </h3>

                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>