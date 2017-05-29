{{ csrf_field() }}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="skill_id" value="">
<div class="row">
    <section class=" col-md-12 no-padding">
        <label class="input">
            <i class="icon-append fa fa-map-marker green"></i>
            <input type="text" name="name" placeholder="Skill Name">
        </label>
    </section>
</div>

<div class="row">
    <section class="col col-12 no-padding">
        <label class="radio-inline">
            <input class="description" type="radio" value="25%" name="description">Beginner
        </label>
        <label class="radio-inline">
            <input class="description" type="radio" value="50%" name="description">Meduim
        </label>
        <label class="radio-inline">
            <input class="description" type="radio" value="75%" name="description">Good
        </label>
        <label class="radio-inline">
            <input class="description" type="radio" value="100%" name="description">Excellence
        </label>
    </section>

</div>

<footer>
    <button type="submit" class="btn-u pull-left" style="margin-left: -50px">Save</button>
    <div class="progress"></div>
</footer>