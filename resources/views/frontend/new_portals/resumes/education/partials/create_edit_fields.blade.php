
    {{csrf_field()}}

    @if(isset($userResume))
        <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
    @endif

    <input type="hidden" name="education_id" value="">
    <div class="row">

        <div class="form-group">

            {!! Form::label('school', 'School', ['class' => 'col-md-1 control-label required']) !!}
            <div class="col-md-5 mail_input_form">
                {!! Form::input('text', 'school', null, ['class' => 'form-control ', 'placeholder' => 'School', 'id' => 'position', 'required']) !!}
            </div><!--col-md-6-->




            {!! Form::label('degree', 'Degree', ['class' => 'col-md-1 control-label required']) !!}
            <div class="col-md-5 ">
                <select name="degree" class="form-control single degree">
                    <option disabled selected>Degree</option>
                    @foreach( $degrees as $degree )

                        <option name="degree_id"
                                value="{{ $degree->id }}">{{ $degree->name }}</option>
                    @endforeach
                </select>

            </div><!--col-md-6-->



        </div><!--form-group-->

    </div>

    <div class="row">

        <div class="form-group">

            {!! Form::label('major', 'Major', ['class' => 'col-md-1 control-label required']) !!}
            <div class="col-md-11 ">
                {!! Form::input('text', 'major', null, ['class' => 'form-control ', 'placeholder' => 'Major', 'id' => 'major', 'required']) !!}
            </div><!--col-md-6-->
        </div>


    </div>

    <div class="row">
        <div class="form-group">

            {!! Form::label('address', 'Address', ['class' => 'col-md-1 control-label required']) !!}
            <div class="col-md-11 ">
                {!! Form::input('text', 'address', null, ['class' => 'form-control ', 'placeholder' => 'School Address', 'id' => 'address', 'required']) !!}
            </div><!--col-md-6-->


        </div>
        {{--<section  class=" col-md-12">
            <label class="input">
                <i class="icon-append fa fa-map-marker green"></i>
                <input type="text" name="address" placeholder="School Address">
            </label>
        </section>--}}
    </div>

    <div class="row date">

        <div class="form-group">

            {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-1 control-label required input']) !!}
            <div class="col-md-5 div_start_date  ">
                <i class="icon-append fa fa-calendar"></i>
                {!! Form::input('text', 'start_date', null, ['class' => 'form-control  ', 'placeholder' => 'StartDate', 'id' => 'start_date', 'required']) !!}
            </div><!--col-md-6-->


            {!! Form::label('end_date', 'End Date', ['class' => 'col-md-1 control-label input']) !!}
            <div class="col-md-5 div_end_date ">
                <i class="icon-append fa fa-calendar"></i>
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
        <label class="pull-right margin-right-20">Till today</label>
    </div>

    <button type="submit" class="btn-u btn-u-dark-blue pull-left">Save</button>
    <div class="progress"></div>



