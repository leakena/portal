{{ csrf_field() }}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="language_resume_id" value="">
<div class="row">
    <div class="form-group">

        {!! Form::label('language_name', 'Name', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::select('language_id' , [], null, ['class'=>'form-control language', 'id'=>'language1' , 'placeholder' => 'Select Language', 'style'=>'width:90%']) !!}
        </div><!--col-md-6-->
    </div>


    {{--<section class=" col-md-12 no-padding">--}}

        {{--<select class="form-control input-sm language" id="language1" name="language_id" style="width: 100%;">--}}
            {{--<option> Select Language </option>--}}
        {{--</select>--}}

    {{--</section>--}}
</div>

<div class="row">
    <div class="form-group">
        <div class="col-md-12" style="padding: 1px">
            {!! Form::input('radio', 'proficiency', 'Mother Tongue', ['class' => 'radio-inline ', 'id' => 'is_mother_tongue', 'required']) !!}
             Mother Tongue
            {!! Form::input('radio', 'proficiency', '25%', ['class' => 'radio-inline ', 'id' => 'proficiency', 'required']) !!}
             25%
            {!! Form::input('radio', 'proficiency', '50%', ['class' => 'radio-inline ', 'id' => 'proficiency', 'required']) !!}
             50%
            {!! Form::input('radio', 'proficiency', '75%', ['class' => 'radio-inline ', 'id' => 'proficiency', 'required']) !!}
             75%
            {!! Form::input('radio', 'proficiency', '100%', ['class' => 'radio-inline ', 'id' => 'proficiency', 'required']) !!}
             100%
        </div>
    </div>
    {{--<section class="col col-12 no-padding">--}}
        {{--<label class="radio-inline">--}}
            {{--<input id="is_mother_tongue" class="proficiency" type="radio" value="Mother Tongue" name="proficiency">Mother Tongue--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
            {{--<input class="proficiency" type="radio" value="25%" name="proficiency">25%--}}
        {{--</label>--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
            {{--<input class="proficiency" type="radio" value="50%" name="proficiency">50%--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
            {{--<input class="proficiency" type="radio" value="75%" name="proficiency">75%--}}
        {{--</label>--}}
        {{--<label class="radio-inline" style="margin-left: 0px">--}}
            {{--<input class="proficiency" type="radio" value="100%" name="proficiency">100%--}}
        {{--</label>--}}
    {{--</section>--}}

</div>

