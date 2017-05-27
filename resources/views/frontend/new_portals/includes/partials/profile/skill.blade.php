<div class="panel panel-profile">
    <div class="panel-heading overflow-h">
        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Skills</h2>
        <a href="#"><i class="fa fa-cog pull-right"></i></a>
    </div>
    <div class="panel-body">
        @if(isset($resume))
            @if($skills = $resume->skills)
                @foreach($skills as $skill)
                    <small>{{ $skill->name }}</small>
                    <small>{{ $skill->description }}</small>
                    <div class="progress progress-u progress-xxs">
                        <div style="width: {{ $skill->description }}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{(int)$skill->description}}" role="progressbar" class="progress-bar progress-bar-u">
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>