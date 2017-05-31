<input type="hidden" name="interest_id" value="">

{{--<section class="col col-md-12 no-padding">
    <label class="input">
        <i class="icon-append fa fa-heart green"></i>
        <input type="text" name="name" placeholder="Field of interest">
    </label>
</section>--}}


<div class="row">

    <div class="form-group">

        {!! Form::label('title', 'Title', ['class' => 'col-md-3 control-label required']) !!}
        <div class="col-md-9 ">
            {!! Form::input('text', 'name', null, ['class' => 'form-control ', 'placeholder' => 'Title', 'id' => 'title', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

<div class="row">

    <div class="form-group">

        {!! Form::label('description', 'Description', ['class' => 'col-md-3 control-label required']) !!}
        <div class="col-md-9 ">
            {!! Form::input('text', 'description', null, ['class' => 'form-control ', 'placeholder' => 'Description', 'id' => 'description', 'required']) !!}
        </div><!--col-md-6-->

    </div><!--form-group-->

</div>

{{--<section class="col col-md-12 no-padding">
    <label class="input">
        <i class="icon-append fa fa-file-text green"></i>
        <input type="text" name="description" placeholder="Description">
    </label>
</section>--}}

<div class="row">
    <div class="form-group">
        <div class="col-md-3 col-md-offest2">
            <button type="submit" class="btn-u pull-left">Save</button>
        </div>

    </div>


</div>


