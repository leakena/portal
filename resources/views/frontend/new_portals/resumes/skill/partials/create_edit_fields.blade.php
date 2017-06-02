{{ csrf_field() }}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="skill_id" value="">
<div class="row">
    <div class="form-group">
        {!! Form::label('skill_name', 'Name', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::input('text', 'name', null, ['class' => 'form-control ', 'placeholder' => 'Skill Name', 'id' => 'skill_name', 'required']) !!}
        </div><!--col-md-6-->
    </div>
    {{--<section class=" col-md-12 no-padding">--}}
    {{--<label class="input">--}}
    {{--<i class="icon-append fa fa-map-marker green"></i>--}}
    {{--<input type="text" name="name" placeholder="Skill Name">--}}
    {{--</label>--}}
    {{--</section>--}}
</div>

<div class="row">
    <div class="form-group">
        <div class="col-md-12">
            {!! Form::input('radio', 'description', '25%', ['class' => 'radio-inline ', 'id' => 'description', 'required']) !!}
            Beginner
            {!! Form::input('radio', 'description', '50%', ['class' => 'radio-inline ', 'id' => 'description', 'required']) !!}
            Medium
            {!! Form::input('radio', 'description', '75%', ['class' => 'radio-inline ', 'id' => 'description', 'required']) !!}
            Good
            {!! Form::input('radio', 'description', '100%', ['class' => 'radio-inline ', 'id' => 'description', 'required']) !!}
            Excellence
        </div>


        {{--<section class="col col-12 no-padding">--}}
        {{--<label class="radio-inline">--}}
        {{--<input class="description" type="radio" value="25%" name="description">Beginner--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
        {{--<input class="description" type="radio" value="50%" name="description">Meduim--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
        {{--<input class="description" type="radio" value="75%" name="description">Good--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
        {{--<input class="description" type="radio" value="100%" name="description">Excellence--}}
        {{--</label>--}}
        {{--</section>--}}
    </div>

</div>

<footer>
    <button type="submit" class="btn-u pull-left" style="margin-left: -50px">Save</button>
    <div class="progress"></div>
</footer>