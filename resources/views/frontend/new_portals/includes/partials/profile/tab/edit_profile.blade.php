
<div id="edit_profile" class="profile-edit tab-pane fade">
    <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
    <p>Below are the name and email addresses on file for your account.</p>
    <br>

    <form action="{{ route('frontend.resume.store_user_info') }}" method="POST"
          class="add_personal_info">

        {{ csrf_field() }}

        <input type="hidden" name="user_uid" value="{{ auth()->user()->id }}">

        <dl class="dl-horizontal form">
            <dt><strong>Your name </strong></dt>
            <dd>
                <span id="name" class="editing">{{ isset($student)?$student['name_latin']:'' }}</span>
                <input type="hidden" name="name"
                       value="{{ isset($student)?$student['name_latin']:'' }}">
                <span>
												<a class="pull-right">
													<i class="fa fa-info name-info"></i>
												</a>
											</span>
            </dd>
            <hr>
            <dt><strong>Your ID </strong></dt>
            <dd>
                <span id="id" class="editing">{{ isset($student)?$student['id_card']:'' }}</span>

                <span>
												<a class="pull-right">
													<i class="fa fa-info id-info"></i>
												</a>
											</span>
            </dd>
            <hr>
            <dt><strong>Gender </strong></dt>
            <dd>
                <span id="gender" class="editing">{{ isset($student)?$student['name_en']:'' }}</span>

                <span>
												<a class="pull-right">
													<i class="fa fa-info gender-info"></i>
												</a>
											</span>
            </dd>
            <hr>
            <dt><strong>Date of birth </strong></dt>
            <dd>
                                <span id="dob"
                                      class="editing">{{ (isset($student)?(new \Carbon\Carbon($student['dob']))->toDateString():'') }}</span>
                <input type="hidden" name="dob" value="{{ (isset($student)?$student['dob']:'') }}">
                <span>
												<a class="pull-right">
													<i class="fa fa-info dob-info"></i>
												</a>
											</span>
            </dd>

            <hr>
            <dt><strong>Place of birth </strong></dt>
            <dd>
                                <span id="birth_place"
                                      class="editing old">{{ isset($resume->personalInfo)?$resume->personalInfo->birth_place:'' }}</span>
                <input class="form-control col-md-7 col-xs-12" style="width: 80%" type="hidden"
                       name="birth_place"
                       value="{{ isset($resume->personalInfo)?$resume->personalInfo->birth_place:'' }}">
                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>
            <hr>
            <dt><strong>Your summery</strong></dt>
            <dd>
                                <span id="career_profile"
                                      class="editing old">{{ isset($resume)?$resume->career_profile:'' }}</span>
                <textarea hidden class="col-md-7 col-xs-12" name="career_profile"
                          style="width: 80%;">{{ isset($resume)?$resume->career_profile:'' }}</textarea>
                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>
            <hr>
            <dt><strong>Marital Status </strong></dt>
            <dd>
                <span id="status_id" class="editing"></span>
                <input type="hidden" name="status_id" class="status_id"
                       value="{{ isset($resume->personalInfo->status)?$resume->personalInfo->status_id:'' }}">
                <span class="old_status">{{ isset($resume->personalInfo->status)?$resume->personalInfo->status->name:'' }}</span>
                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_status"></i>
												</a>
											</span>

                {{--{{ dd($resume->personalInfo->status) }}--}}
                {{--<span id="status_id" class="editing old">{{ isset($resume->personalInfo->status)?$resume->personalInfo->status->name:'' }}--}}
                                {{--<input type="hidden" name="status_id" value="{{ isset($resume->personalInfo->status)?$resume->personalInfo->status->name:'' }}">--}}
                                {{--</span>--}}

                {{--<span>--}}
                                {{--<a class="pull-right">--}}
                                {{--<i class="fa fa-pencil edit_status"></i>--}}
                                {{--</a>--}}
                                {{--</span>--}}
            </dd>

            <hr>
            <dt><strong>Job </strong></dt>
            <dd>
                                <span id="job"
                                      class="editing old">{{ isset($resume->personalInfo)?$resume->personalInfo->job:'' }}</span>
                <input class="form-control col-md-7 col-xs-12" type="hidden" name="job"
                       style="width: 80%"
                       value="{{ isset($resume->personalInfo)?$resume->personalInfo->job:'' }}">


                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>

            <hr>
            <dt><strong>Phone Number </strong></dt>
            <dd>
                                <span id="phone"
                                      class="editing old">{{ isset($resume->personalInfo)?$resume->personalInfo->phone:'' }}</span>
                <input class="form-control col-md-7 col-xs-12" type="hidden" name="phone"
                       style="width: 80%"
                       value="{{ isset($resume->personalInfo)?$resume->personalInfo->phone:'' }}">


                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>

            <hr>
            <dt><strong>Email </strong></dt>
            <dd>
                                <span id="email"
                                      class="editing old">{{ isset($resume->personalInfo)?$resume->personalInfo->email:'' }}</span>
                <input class="form-control col-md-7 col-xs-12" type="hidden" name="email"
                       style="width: 80%;"
                       value="{{ isset($resume->personalInfo)?$resume->personalInfo->email:'' }}">


                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>

            <hr>
            <dt><strong>Address </strong></dt>
            <dd>
                                <span id="address"
                                      class="editing old">{{ isset($resume->personalInfo)?$resume->personalInfo->address:'' }}</span>
                <input class="form-control col-md-7 col-xs-12" type="hidden" name="address"
                       style="width: 80%"
                       value="{{ isset($resume->personalInfo)?$resume->personalInfo->address:'' }}">


                <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
            </dd>
            <hr>
        </dl>

        <button type="submit" class="btn-u save" id="save_personal_info">Save</button>
    </form>


</div>