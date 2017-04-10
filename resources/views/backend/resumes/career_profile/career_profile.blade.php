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
                            <form id="career-profile" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="description" type="text" id="description" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $(".add_new").hide();

            $(document).on('click', "#add", function () {
                $(".add_new").show();
            });

            $('#career-profile').on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/resume/save-career-profile',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'description': $('#description').val()
                    },
                    dataType:'html',
                    success: function (response) {
                       $('div.my_career_profile').html(response);
                        setLabelButton('Update Career Profile');
                        $(".add_new").hide();
                    }
                });
            });

        });

        @if(isset($newCareerProfile))
            @if($newCareerProfile->career_profile)

                setLabelButton('Update Career Profile');
            @else
                setLabelButton('Add Career Profile');

            @endif

        @else
                setLabelButton('Add Career Profile');
        @endif


        function setLabelButton(label) {
            $('#add').text(label)
        }
    </script>
@endsection
