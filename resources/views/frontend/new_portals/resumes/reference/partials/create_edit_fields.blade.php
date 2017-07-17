
{{csrf_field()}}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="reference_id" value="">

{{--<div class="row each_top_row">
    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-user green"></i>
            <input type="text" name="name" placeholder="Name">
        </label>
    </section>

</div>--}}


<div class="row">

    <div class="form-group">

        {!! Form::label('reference_name', 'Name', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::input('text', 'name', null, ['class' => 'form-control ', 'placeholder' => 'Reference Name', 'id' => 'reference_name', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>


<div class="row">

    <div class="form-group">

        {!! Form::label('reference_position', 'Position', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::input('text', 'position', null, ['class' => 'form-control ', 'placeholder' => 'Reference Position', 'id' => 'reference_position', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

{{--<div class="row each_top_row">
    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-briefcase green"></i>
            <input type="text" name="position" placeholder="Position">
        </label>
    </section>
</div>--}}


<div class="row">

    <div class="form-group">

        {!! Form::label('reference_phone', 'Phone', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::input('text', 'phone', null, ['class' => 'form-control ', 'placeholder' => 'Reference Phone', 'id' => 'reference_phone', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

{{--<div class="row each_top_row">

    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-phone green"></i>
            <input type="text" name="phone" placeholder="Phone Number">
        </label>
    </section>

</div>--}}

{{--<div class="row each_top_row">

    <section class="col col-md-12 ">
        <label class="input">
            <i class="icon-append fa fa-envelope green"></i>
            <input type="text" name="email" placeholder="Email Address">
        </label>
    </section>

</div>--}}

<div class="row">

    <div class="form-group">

        {!! Form::label('reference_email', 'Email', ['class' => 'col-md-2 control-label required']) !!}
        <div class="col-md-10 ">
            {!! Form::input('email', 'email', null, ['class' => 'form-control ', 'placeholder' => 'Reference Email', 'id' => 'reference_email', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->


</div>

<div class="row">

    <div class="form-group">

        <div class="col-md-2">
            <button type="submit" class=" btn-u btn-u-dark-blue ">Save</button>
        </div>
    </div>

</div>


{{--<div class="row no-padding">
    <section class="col col-md-6 no-padding">
        <label class="input">
            <i class="icon-append fa fa-phone green"></i>
            <input type="text" name="phone" placeholder="Phone Number">
        </label>
    </section>

    <section class="col col-md-6 ">
        <label class="input">
            <i class="icon-append fa fa-envelope green"></i>
            <input type="text" name="email" placeholder="Email Address">
        </label>
    </section>

</div>--}}







