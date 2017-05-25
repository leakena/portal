{{ csrf_field() }}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="language_resume_id" value="">
<div class="row">
    <section class=" col-md-12">

        <select class="form-control input-sm" id="language1" name="language_id" style="width: 100%;">
            <option> Select Language </option>
        </select>

    </section>
</div>

<div class="row">
    <section class="col col-12">
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="10%" name="proficiency">10%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="20%" name="proficiency">20%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="30%" name="proficiency">30%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="40%" name="proficiency">40%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="50%" name="proficiency">50%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="60%" name="proficiency">60%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="70%" name="proficiency">70%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="80%" name="proficiency">80%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="90%" name="proficiency">90%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="100%" name="proficiency">100%
        </label>
        <label class="radio-inline">
            <input class="proficiency" type="radio" value="Mother Tongue" name="proficiency">Mother Tongue
        </label>
    </section>

</div>

<footer>
    <button type="submit" class="btn-u pull-left save">Save</button>
    <div class="progress"></div>
</footer>