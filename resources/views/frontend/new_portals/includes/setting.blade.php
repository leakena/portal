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

                    @if(isset($resume->personalInfo))
                        <form action="{{ route('frontend.resume.store_user_info') }}" method="POST">
                            {{ csrf_field() }}

                            @if(isset($resume))
                                <input type="hidden" name="resume_uid" value="{{ $resume->id }}">
                            @endif
                            <dl class="dl-horizontal">
                                <dt><strong>Your name </strong></dt>
                                <dd>
                                    <span id="name" class="editing">
                                        <input type="hidden" name="name" value="{{ $resume->personalInfo->name }}">
                                        <span class="old">{{ $resume->personalInfo->name }}</span>
                                    </span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Your ID </strong></dt>
                                <dd>
                                    <span id="email" class="editing">
                                        <input type="hidden" name="email" value="{{ $resume->personalInfo->email }}">
                                        <span class="old">{{ $resume->personalInfo->email }}</span>
                                    </span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Date of birth </strong></dt>
                                <dd>
                                    <span id="dob" class="editing">
                                        <input type="hidden" name="dob" value="{{ $resume->personalInfo->dob }}">
                                        <span class="old">{{ $resume->personalInfo->dob }}</span>
                                    </span>
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Place of birth </strong></dt>
                                <dd>
                                    <span id="birth_place" class="editing">
                                        <input type="hidden" name="birth_place"
                                               value="{{ $resume->personalInfo->birth_place }}">
                                        <span class="old"> {{ $resume->personalInfo->birth_place }} </span>
                                    </span>
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
                                    <input type="hidden" name="status_id"
                                           value="{{ $resume->personalInfo->status_id}}">
                                    <span class="old">{{ $resume->personalInfo->status->name }}</span>
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_status"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Job </strong></dt>
                                <dd>
                                    <span id="job" class="editing">
                                        <input type="hidden" name="job" value="{{ $resume->personalInfo->job }}">
                                        <span class="old">{{ $resume->personalInfo->job }}</span>
                                    </span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Phone Number </strong></dt>
                                <dd>
                                    <span id="phone" class="editing">
                                        <input type="hidden" name="phone" value="{{ $resume->personalInfo->phone }}">
                                        <span class="old">{{ $resume->personalInfo->phone }}</span>
                                    </span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Address </strong></dt>
                                <dd>
                                    <span id="address" class="editing">
                                        <input type="hidden" name="address"
                                               value="{{ $resume->personalInfo->address }}">
                                        <span class="old">{{ $resume->personalInfo->address }}</span>
                                    </span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                            </dl>
                            <button type="button" class="btn-u btn-u-default">Cancel</button>
                            <button type="submit" class="btn-u">Save Changes</button>
                        </form>
                    @else
                        <form action="{{ route('frontend.resume.store_user_info') }}" method="POST" class="add_personal_info">

                            {{ csrf_field() }}

                            @if(isset($resume))
                                <input type="hidden" name="resume_uid" value="{{ $resume->id }}">
                            @endif

                            <dl class="dl-horizontal">
                                <dt><strong>Your name </strong></dt>
                                <dd>
                                    <span id="name" class="editing">{{ isset($student)?$student['name_latin']:'' }}</span>
                                    <input type="hidden" name="name" value="{{ isset($student)?$student['name_latin']:'' }}">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Your ID </strong></dt>
                                <dd>
                                    <span id="id" class="editing">{{ isset($student)?$student['id_card']:'' }}</span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Gender </strong></dt>
                                <dd>
                                    <span id="gender" class="editing">{{ isset($student)?$student['name_en']:'' }}</span>

                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Date of birth </strong></dt>
                                <dd>
                                    <span id="dob" class="editing">{{ (isset($student)?(new \Carbon\Carbon($student['dob']))->toDateString():'') }}</span>
                                    <span>
												<a class="pull-right">
													<i class="fa fa-info dob-info"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Place of birth </strong></dt>
                                <dd>
                                    <span id="birth_place" class="editing"></span>
                                    <input type="hidden" name="birth_place" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>


                                <hr>
                                <dt><strong>Marital Status </strong></dt>
                                <dd>
                                    <span id="status_id" class="editing"></span>
                                    <input type="hidden" name="status_id" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_create_status"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Job </strong></dt>
                                <dd>
                                    <span id="job" class="editing"></span>
                                    <input type="hidden" name="job" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Phone Number </strong></dt>
                                <dd>
                                    <span id="phone" class="editing"></span>
                                    <input type="hidden" name="phone" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Email </strong></dt>
                                <dd>
                                    <span id="email" class="editing"></span>
                                    <input type="hidden" name="email" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Address </strong></dt>
                                <dd>
                                    <span id="address" class="editing"></span>
                                    <input type="hidden" name="address" value="">
                                    <span>
												<a class="pull-right">
													<i class="fa fa-pencil edit_new"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                            </dl>
                            <button type="button" class="btn-u btn-u-default">Cancel</button>
                            <button type="submit" class="btn-u">Save Changes</button>
                        </form>
                    @endif


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
            validate_personal_info($('.add_personal_info'));
        })

        $(document).on('click', '.edit', function () {
            var dom = $(this).parent().parent().parent();
            var old_value = dom.find('.old').text();


            if (dom.find('input').prop('type') == 'hidden') {
                dom.find('input').prop('type', 'text');
                dom.find('.old').hide();
            } else {
                dom.find('input').prop({'type': 'hidden', 'value': old_value});
                dom.find('.old').show().text(dom.find('input').val());

            }

        });


        $(document).on('click', '.edit_new', function () {
            var dom = $(this).parent().parent().parent().find('.editing');
            console.log(dom);

            var edit = '';
            edit += '<input class="form-group" style="width: 70%; " name="' + dom.prop('id') + '" value="' + (dom.text()).trim() + '">';

            dom.html(edit);
            // console.log(dom.prop('type'))


        });

        $(document).on('click', '.edit_status', function () {
            var dom = $(this).parent().parent().parent().find('.editing');
            var selectedStatus = $(this).parent().parent().parent().find('.old').text()
            var temp = $(this);

            if (temp.parent().parent().parent().find('.old').is(":visible")) {
                temp.parent().parent().parent().find('input[name=status_id]').prop('name', 'not_status');
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
                                if (val.name == selectedStatus) {
                                    edit += '<option selected value="' + val.id + '">' + val.name + '</option>';
                                } else {
                                    edit += '<option value="' + val.id + '">' + val.name + '</option>';
                                }

                            });

                            dom.html(edit);
                            temp.parent().parent().parent().find('.old').hide();

                        }

                    }

                });

            } else {
                temp.parent().parent().parent().find('#status').remove();
                temp.parent().parent().parent().find('input[name=not_status]').prop('name', 'status_id');

                temp.parent().parent().parent().find('.old').show();
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

                        dom.html(edit);
                        temp.parent().parent().parent().find('.old').hide();

                    }

                }

            });

        });

        $(document).on('click', '.dob-info', function (event) {
            event.preventDefault();
            swal({
                title: "You cannot edit date of birth",
                text: "If you want to edit, please go to administration office!",
                type: "info"
            });

        });

    </script>

@endsection