
    {{csrf_field()}}

    @if(isset($userResume))
        <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
    @endif

    <input type="hidden" name="education_id" value="">
    <div class="row">
        <section class="col col-6">
            <label class="input">
                <i class="icon-append fa fa-user green"></i>
                <input type="text" name="school" placeholder="School">
            </label>
        </section>
        <section class="col col-6">
            <label class="input">
                <i class="icon-append fa fa-briefcase green"></i>
                <input type="text" name="major" placeholder="Major">
            </label>
        </section>
    </div>

    <div class="row">
        <section class="col-md-6">
            <label class="select"></label>
            <select name="degree" class="form-control single degree">
                <option disabled selected>Degree</option>
                @foreach( $degrees as $degree )

                    <option name="degree_id"
                            value="{{ $degree->id }}">{{ $degree->name }}</option>
                @endforeach
            </select>

        </section>

    </div>

    <div class="row">
        <section  class=" col-md-12">
            <label class="input">
                <i class="icon-append fa fa-map-marker green"></i>
                <input type="text" name="address" placeholder="School Address">
            </label>
        </section>
    </div>

    <div class="row">
        <section class="col col-5">
            <label class="input">
                <i class="icon-append fa fa-calendar green"></i>
                <input type="text" name="start_date" placeholder="Start Date"/>
            </label>
        </section>
        <section class="col col-5 find_end_date">
            <label class="input">
                <i class="icon-append fa fa-calendar green"></i>
                <input type="text" name="end_date" placeholder="End Date"/>
            </label>
        </section>

        <section class="col col-2 ">
            <input type="hidden" name="is_present"
                   value="{{ isset($education)?$education->is_present:'0' }}">
            <div class="input-group">
                <label class="switch">
                    <input type="checkbox" class="slider_update">
                    <div class="slider round"></div>
                </label>
            </div>
        </section>

    </div>

    <button type="submit" class="btn-u pull-left">Save</button>
    <div class="progress"></div>



