{{csrf_field()}}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="experience_id" value="">
<div class="row">

    <div class="form-group">

        {!! Form::label('position', 'Position', ['class' => 'col-md-1 control-label required']) !!}
        <div class="col-md-5 mail_input_form">
            {!! Form::input('text', 'position', null, ['class' => 'form-control ', 'placeholder' => 'Position', 'id' => 'position', 'required']) !!}
        </div><!--col-md-6-->

        {!! Form::label('company', 'Company', ['class' => 'col-md-1 control-label required']) !!}
        <div class="col-md-5 ">
            {!! Form::input('text', 'company', null, ['class' => 'form-control ', 'placeholder' => 'Company', 'id' => 'company', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

<div class="row">

    <div class="form-group">

        {!! Form::label('address', 'Address', ['class' => 'col-md-1 control-label required']) !!}
        <div class="col-md-11 ">
            {!! Form::input('text', 'address', null, ['class' => 'form-control ', 'placeholder' => 'Address', 'id' => 'address', 'required']) !!}
        </div><!--col-md-6-->
    </div><!--form-group-->

</div>

<div class="row date">

    <div class="form-group">

        {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-1 control-label required input']) !!}
        <div class="col-md-5 div_start_date  ">
            {{--<i class="icon-append fa fa-calendar green"></i>--}}
            {!! Form::input('text', 'start_date', null, ['class' => 'form-control  ', 'placeholder' => 'StartDate', 'id' => 'start_date', 'required']) !!}
        </div><!--col-md-6-->


        {!! Form::label('end_date', 'End Date', ['class' => 'col-md-1 control-label input']) !!}
        <div class="col-md-5 div_end_date ">
           {{-- <i class="icon-append fa fa-calendar green"></i>--}}
            {!! Form::input('text', 'end_date', null, ['class' => 'form-control  ', 'placeholder' => 'EndDate', 'id' => 'end_date']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

<div class="row no-padding switcher">
    <input type="hidden" name="is_present"
           value="0">
    <div class="input-group pull-right">
        <label class="switch">
            <input type="checkbox" name="slider_date" class="slider_update">
            <div class="slider round"></div>
        </label>
    </div>

</div>

<div class="row">

    <div class="form-group">

        <div class="col-md-12">
            {{--<i class="icon-append fa fa-comment green"></i>--}}
            <textarea rows="5" class="form-control" name="description" placeholder="Your Description"></textarea>
        </div>
    </div>

    <section class="col-md-12">
        <label class="textarea">

        </label>
    </section>
</div>

<button type="submit" class="btn-u pull-left">Save</button>
<div class="progress"></div>



