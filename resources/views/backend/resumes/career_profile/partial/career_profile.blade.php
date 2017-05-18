<div role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger error_message_alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12 career-profile">
                <div class="x_panel">
                    <div class="x_title">
                        @if(isset($newCareerProfile))
                            <button type="button" class="btn btn-warning btn-sm preview pull-left" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">
                                <i class="fa fa-eye" aria-hidden="true"></i> Preview
                            </button>
                        @endif

                        @if(isset($newCareerProfile))
                            @if($newCareerProfile->career_profile)
                                <button id="add1" type="button" class="btn btn-primary btn-sm ">
                                    Edit Career Profile
                                </button>
                            @else
                                <button id="add" type="button" class="btn btn-primary btn-sm ">
                                    Add Career Profile
                                </button>
                            @endif
                        @else
                            <button id="add" type="button" class="btn btn-primary btn-sm ">
                                Add Career Profile
                            </button>
                        @endif


                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content show1">
                        <br/>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            @if(isset($newCareerProfile))
                                @if($newCareerProfile->career_profile)
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <p>{!! $newCareerProfile->career_profile !!}</p>
                                            <input type="hidden" name="career_profile"
                                                   value="{$newCareerProfile->career_profile }}">


                                        </div>
                                    </div>
                                @else
                                    Please add your career profile
                                @endif
                            @else
                                Please add your career profile
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>