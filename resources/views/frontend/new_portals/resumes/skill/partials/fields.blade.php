<div class="each_skill">
    <input type="hidden" class="name" value="{{ $skill->name }}">
    <h3 class="heading-xs" >{{ $skill->name }} <span class="pull-right description">{{ $skill->description }}</span> </h3>
    <input type="hidden" class="skill_id" name="hidden_id" value="{{ $skill->id }}">
    <div class="progress progress-u progress-sm">
        <div class="progress-bar progress-bar-dark-blue" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: {{ (int)$skill->description }}%">
        </div>
    </div>
</div>

