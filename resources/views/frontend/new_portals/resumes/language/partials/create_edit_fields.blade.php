{{ csrf_field() }}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="language_resume_id" value="">
<div class="row">
    <section class=" col-md-12 no-padding">

        <select class="form-control input-sm language" id="language1" name="language_id" style="width: 100%;">
            <option> Select Language </option>
        </select>

    </section>
</div>

<div class="row">
    <section class="col col-12 no-padding">
        <label class="radio-inline">
            <input id="is_mother_tongue" class="proficiency" type="radio" value="Mother Tongue" name="proficiency">Mother Tongue
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="25%" name="proficiency">25%
        </label>
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="50%" name="proficiency">50%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="75%" name="proficiency">75%
        </label>
        <label class="radio-inline" style="margin-left: 0px">
            <input class="proficiency" type="radio" value="100%" name="proficiency">100%
        </label>
    </section>

</div>

