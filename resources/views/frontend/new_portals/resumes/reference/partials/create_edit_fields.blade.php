
{{csrf_field()}}
@if(isset($userResume))
    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
@endif
<input type="hidden" name="reference_id" value="">
<div class="row each_top_row">
    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-user green"></i>
            <input type="text" name="name" placeholder="Name">
        </label>
    </section>

</div>

<div class="row each_top_row">
    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-briefcase green"></i>
            <input type="text" name="position" placeholder="Position">
        </label>
    </section>
</div>

<div class="row each_top_row">

    <section class="col col-md-12">
        <label class="input">
            <i class="icon-append fa fa-phone green"></i>
            <input type="text" name="phone" placeholder="Phone Number">
        </label>
    </section>

</div>

<div class="row each_top_row">

    <section class="col col-md-12 ">
        <label class="input">
            <i class="icon-append fa fa-envelope green"></i>
            <input type="text" name="email" placeholder="Email Address">
        </label>
    </section>

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


<button type="submit" class="btn-u pull-left">Save</button>
<div class="progress"></div>



