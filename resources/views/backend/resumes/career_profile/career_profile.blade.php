@extends('backend.layouts.resume')


@section('content')


    <div class="my_career_profile">
        @include('backend.resumes.career_profile.partial.career_profile')
    </div>



    <div role="main" class="add_new">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Career Profile </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form action="/resume/save-career-profile" method="POST" id="career-profile" data-parsley-validate class="form-horizontal form-label-left">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea type="text" id="description" name="description" required="required"
                                                  class="form-control">{{isset($newCareerProfile)?$newCareerProfile->career_profile:''}}
                                            </textarea>
                                        <input type="hidden" name="resume_uid" value="{{isset($newCareerProfile)?$newCareerProfile->id:''}}">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-7">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-info" id="submit">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')
    <script>


        @if(isset($newCareerProfile))
            @if($newCareerProfile->career_profile)

                setLabelButton('Update Career Profile');
                $(".add_new").hide();

                    $(document).on('click', "#add", function () {

                        var resume_id = '{{$newCareerProfile->id}}';

                        $.ajax({
                            url:'{{route('frontend.resume.user_resume')}}',
                            method:'GET',
                            data:{
                                resume_id:resume_id
                            },
                            dataType:'json',
                            success:function (response) {

                                console.log(response);
                                $('input[name=description]').val(response.resume.career_profile);

                                $(".add_new").show();

                            }
                        })



//                        var career_profile = $('input[name=career_profile]').val();
//                        $('input[name=description]').val(career_profile);
//
//                        $(".add_new").show();

                    });



            @else
                setLabelButton('Add Career Profile');
                 $(".add_new").hide();
                 $(document).on('click', "#add", function () {
                     $('.add_new').toggle();
                 });

            @endif

        @else
            setLabelButton('Add Career Profile');
            $(".add_new").hide();
            $(document).on('click', "#add", function () {
                $('.add_new').toggle();
            });
        @endif


        function setLabelButton(label) {
            $('#add').text(label)
        }

        setTimeout(function(){
            if($('.error_message_alert').is(':visible')) {
                $('.error_message_alert').fadeOut();
            }

        }, 3000);
    </script>
@endsection
