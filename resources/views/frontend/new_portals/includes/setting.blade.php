@extends('frontend.layouts.master_portal')

@section('content')
    <div class="profile-body margin-bottom-20">
        <div class="tab-v1">
            <ul class="nav nav-justified nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                <li><a data-toggle="tab" href="#payment">Payment Options</a></li>
                <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
            </ul>
            <div class="tab-content">
                <div id="profile" class="profile-edit tab-pane fade in active">
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

                <div id="passwordTab" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Security Settings</h2>
                    <p>Change your password.</p>
                    <br>
                    <form class="sky-form" id="sky-form4" action="{{ route('frontend.auth.change_password') }}"
                          method="post">

                        {{csrf_field()}}
                        <dl class="dl-horizontal">
                            {{--<dt>Username</dt>--}}
                            {{--<dd>--}}
                            {{--<section>--}}
                            {{--<label class="input">--}}
                            {{--<i class="icon-append fa fa-user"></i>--}}
                            {{--<input type="text" placeholder="Username" name="username">--}}
                            {{--<b class="tooltip tooltip-bottom-right">Needed to enter the website</b>--}}
                            {{--</label>--}}
                            {{--</section>--}}
                            {{--</dd>--}}
                            {{--<dt>Email address</dt>--}}
                            {{--<dd>--}}
                            {{--<section>--}}
                            {{--<label class="input">--}}
                            {{--<i class="icon-append fa fa-envelope"></i>--}}
                            {{--<input type="email" placeholder="Email address" name="email">--}}
                            {{--<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>--}}
                            {{--</label>--}}
                            {{--</section>--}}
                            {{--</dd>--}}
                            <dt>Olde password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" id="password" name="old_password"
                                               placeholder="Old Password">
                                    </label>
                                </section>
                            </dd>
                            <dt>Enter new password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Confirm Password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password_confirmation"
                                               placeholder="Confirm password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                        </dl>
                        {{--<label class="toggle toggle-change"><input type="checkbox" checked=""--}}
                        {{--name="checkbox-toggle-1"><i class="no-rounded"></i>Remember--}}
                        {{--password</label>--}}
                        {{--<br>--}}
                        {{--<section>--}}
                        {{--<label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I--}}
                        {{--agree with the Terms and Conditions</a></label>--}}
                        </section>
                        <button type="button" class="btn-u btn-u-default">Cancel</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>

                <div id="payment" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Payment Settings</h2>
                    <p>Below are the payment options for your account.</p>
                    <br>
                    <form class="sky-form" id="sky-form" action="#">
                        <!--Checkout-Form-->
                        <section>
                            <div class="inline-group">
                                <label class="radio"><input type="radio" checked="" name="radio-inline"><i
                                            class="rounded-x"></i>Visa</label>
                                <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>MasterCard</label>
                                <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>PayPal</label>
                            </div>
                        </section>

                        <section>
                            <label class="input">
                                <input type="text" name="name" placeholder="Name on card">
                            </label>
                        </section>

                        <div class="row">
                            <section class="col col-10">
                                <label class="input">
                                    <input type="text" name="card" id="card" placeholder="Card number">
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="input">
                                    <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <label class="label col col-4">Expiration date</label>
                            <section class="col col-5">
                                <label class="select">
                                    <select name="month">
                                        <option disabled="" selected="" value="0">Month</option>
                                        <option value="1">January</option>
                                        <option value="1">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                    <input type="text" placeholder="Year" id="year" name="year">
                                </label>
                            </section>
                        </div>
                        <button type="button" class="btn-u btn-u-default">Cancel</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                        <!--End Checkout-Form-->
                    </form>
                </div>

                <div id="settings" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Notifications.</h2>
                    <p>Below are the notifications you may manage.</p>
                    <br>
                    <form class="sky-form" id="sky-form3" action="#">
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                    class="no-rounded"></i>Email notification</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                    class="no-rounded"></i>Send me email notification when a user comments on my
                            blog</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                    class="no-rounded"></i>Send me email notification for the latest update</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                    class="no-rounded"></i>Send me email notification when a user sends me
                            message</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i
                                    class="no-rounded"></i>Receive our monthly newsletter</label>
                        <hr>
                        <button type="button" class="btn-u btn-u-default">Reset</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('after-script-end')

    <script>
        $(document).ready(function () {

            //validate_personal_info($('.add_personal_info'));
            $('#save_personal_info').hide();
        });

        $(document).on('click', '.edit', function () {
            var dom = $(this).parent().parent().parent();
            var old_value = dom.find('.old').text();


            if (dom.find('input').prop('type') == 'hidden' || dom.find('textarea').is(':hidden')) {

                dom.find('textarea').prop('hidden', false).addClass('show_save').focus();
                dom.find('input').prop('type', 'text').addClass('show_save').focus();
                dom.find('.old').hide();
            } else {

                dom.find('textarea').prop({'hidden': true, 'value': old_value}).removeClass('show_save');
                dom.find('input').prop({'type': 'hidden', 'value': old_value}).removeClass('show_save');
                dom.find('.old').show().text(dom.find('input').val());

            }

            if ($('form[class=add_personal_info]').find('.show_save').length != 0) {
                $('#save_personal_info').show();
            } else {
                $('#save_personal_info').hide();
            }

        });


        $(document).on('click', '.edit_new', function () {
            var dom = $(this).parent().parent().parent().find('.editing');
            var edit = '';
            edit += '<input class="form-group" style="width: 70%; " name="' + dom.prop('id') + '" value="' + (dom.text()).trim() + '">';

            dom.html(edit);
            // console.log(dom.prop('type'))


        });

        $(document).on('click', '.edit_status', function () {
            var dom = $(this).parent().parent().parent();

            var selectedStatus = $(this).parent().parent().parent().find('.old_status').text();

            var temp = $(this);

            if (dom.find('input').hasClass('status_id')) {

                temp.parent().parent().parent().find('input[name=status_id]').prop({
                    'name': 'not_status',
                    'class': 'not_status'
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('frontend.resume.get_marital_status') }}',
                    data: {
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function (result) {
                        if (result.status = true) {
                            var edit = '';
                            edit += '<select name="status_id" class="form-control col-md-7 col-xs-12 show_save" id="status" style="width: 80%">';

                            $.each(result.statues, function (key, val) {
                                if (val.name == selectedStatus) {
                                    edit += '<option selected value="' + val.id + '">' + val.name + '</option>';
                                } else {
                                    edit += '<option value="' + val.id + '">' + val.name + '</option>';
                                }

                            });

                            dom.find('.editing').html(edit);
                            dom.parent().parent().find('#save_personal_info').show();
                            console.log(dom.parent().parent())
                            temp.parent().parent().parent().find('.old_status').hide();
                        }

                    }

                });

            } else {

                temp.parent().parent().parent().find('#status').remove();
                temp.parent().parent().parent().find('input[name=not_status]').prop({
                    'name': 'status_id',
                    'class': 'status_id'
                });

                temp.parent().parent().parent().find('.old_status').show();
                if ($('form[class=add_personal_info]').find('.show_save').length != 0) {
                    $('#save_personal_info').show();
                } else {
                    $('#save_personal_info').hide();
                }
            }


        });

        $(document).on('click', '.edit_create_status', function () {
            var dom = $(this).parent().parent().parent().find('.editing');

            var temp = $(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('frontend.resume.get_marital_status') }}',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: function (result) {
                    if (result.status = true) {
                        var edit = '';
                        edit += '<select name="status_id" class="form-control col-md-7 col-xs-12" id="status" style="width: 80%">';

                        $.each(result.statues, function (key, val) {

                            edit += '<option value="' + val.id + '">' + val.name + '</option>';

                        });

                        dom.find('.editing').html(edit);
                        temp.parent().parent().parent().find('.old').hide();

                    }

                }

            });

        });

        $(document).on('click', '.dob-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit date of birth!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.name-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit name!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.id-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit id card!', 'If you want to edit please contact to administration office');
        });
        $(document).on('click', '.gender-info', function (event) {
            event.preventDefault();
            notify('info', 'You cannot edit gender!', 'If you want to edit please contact to administration office');
        });

        $(document).on('click', '.save', function (e) {
            e.preventDefault();

            var dom = $(this).siblings();
            var temp = $(this);


            var status_name = dom.find('select option:selected').text();

            if (status_name == '') {
                status_name = dom.find('.old_status').text();
            }
            var user = $(this).siblings('input[name=user_uid]').val();

            var birth_place = dom.find('input[name=birth_place]').val();
            var career_profile = dom.find('textarea[name=career_profile]').val();

            var status_id = dom.find('input[name=status_id]').val();
            if (status_id) {
                console.log(status_id);
            } else {
                status_id = dom.find('select option:selected').val();
            }


            var job = dom.find('input[name=job]').val();
            var phone = dom.find('input[name=phone]').val();
            var email = dom.find('input[name=email]').val();
            var address = dom.find('input[name=address]').val();

            if (birth_place == "") {
                notify('error', 'Place of birth cannot be null!', 'Please input your place of birth');
            } else if (career_profile == "") {
                notify('error', 'Your summery cannot be null!', 'Please input your summery');
            } else if (status_id == "") {
                notify('error', 'Marital status cannot be null!', 'Please choose your marital status');
            } else if (job == "") {
                notify('error', 'Job cannot be null!', 'Please input your job');
            } else if (phone == "") {
                notify('error', 'Phone cannot be null!', 'Please input your phone number');
            } else if (email == "") {
                notify('error', 'Email cannot be null!', 'Please input your phone email');
            } else if (address == "") {
                notify('error', 'Address cannot be null!', 'Please input your address');
            } else {
//                $('.add_personal_info').submit();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('frontend.resume.store_user_info') }}',
                    data: {
                        _token: '{!! csrf_token() !!}',
                        'user_uid': user,
                        'name': dom.find('input[name=name]').val(),
                        'dob': dom.find('input[name=dob]').val(),
                        'birth_place': birth_place,
                        'career_profile': career_profile,
                        'status_id': status_id,
                        'status_name': status_name,
                        'job': job,
                        'phone': phone,
                        'email': email,
                        'address': address
                    },
                    success: function (response) {
                        if (response.status == true) {
                            notify('success', 'Successful!', 'Your personal information was saved');
                            temp.hide();
                            dom.find('input[name=birth_place]').remove();
                            dom.find('input[name=not_status]').remove();
                            dom.find('textarea[name=career_profile]').remove();
                            dom.find('input[name=job]').remove();
                            dom.find('input[name=phone]').remove();
                            dom.find('input[name=email]').remove();
                            dom.find('input[name=address]').remove();

                            var birth_place = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="birth_place" style="width: 80%" value="' + response.birth_place + '">';
                            birth_place += '<span class="old editing" id="birth_place">' + response.birth_place + '</span>';
                            $('#birth_place').after(birth_place);
                            $('#birth_place').remove();

                            var career_profile = '<textarea class="col-md-7 col-xs-12" hidden name="career_profile" style="width: 80%">' + response.career_profile + '</textarea>';
                            career_profile += '<span id="career_profile" class="editing old">' + response.career_profile + '</span>';
                            $('#career_profile').after(career_profile);
                            $('#career_profile').remove();

                            var marital_status = '<span id="status_id" class="editing"></span>';
                            marital_status += '<input type="hidden" name="status_id" class="status_id" value="' + response.status_id + '">'
                            marital_status += '<span class="old_status">' + status_name + '</span>'
                            $('.old_status').remove();
                            $('#status_id').after(marital_status);
                            $('#status_id').remove();

                            var job = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="job" style="width: 80%" value="' + response.job + '">';
                            job += '<span class="old editing" id="job">' + response.job + '</span>';
                            $('#job').after(job);
                            $('#job').remove();

                            var phone = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="phone" style="width: 80%;" value="' + response.phone + '">';
                            phone += '<span class="old editing" id="phone">' + response.phone + '</span>';
                            $('#phone').after(phone);
                            $('#phone').remove();


                            var email = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="email" style="width: 80%;" value="' + response.email + '">';
                            email += '<span class="old editing" id="email">' + response.email + '</span>';
                            $('#email').after(email);
                            $('#email').remove();

                            var address = '<input class="form-control col-md-7 col-xs-12" type="hidden" name="address" style="width: 80%" value="' + response.address + '">';
                            address += '<span class="old editing" id="address">' + response.address + '</span>';
                            $('#address').after(address);
                            $('#address').remove();

                        }
                    }
                })
            }

        })


    </script>

@endsection