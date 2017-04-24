<div role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button id="add" type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal"
                                data-target="#add-career-profile">Add Career Profile
                        </button>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            @if(isset($newCareerProfile))

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{ $newCareerProfile->career_profile }}
                                        <input type="hidden" name="career_profile"
                                               value="{{$newCareerProfile->career_profile }}">


                                    </div>
                                </div>
                            @else

                                {{--<div class="alert-info">
                                    Please Create Your First Carree Profile
                                </div>--}}

                            @endif


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>