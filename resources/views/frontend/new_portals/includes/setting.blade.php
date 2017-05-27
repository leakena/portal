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

                    {{--{{dd($resume->user)}}--}}
                    @if($resume->personalInfo)
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
                                        {{ $resume->personalInfo->name }}
                                    </span>

                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Your ID </strong></dt>
                                <dd>
                                    <span id="email" class="editing">
                                        <input type="hidden" name="email" value="{{ $resume->personalInfo->email }}">
                                        {{ $resume->personalInfo->email }}
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
                                        {{ $resume->personalInfo->dob }}
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
                                        {{ $resume->personalInfo->birth_place }}
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
                                    <span id="status_id" class="editing">
                                        <input type="hidden" name="status_id"
                                               value="{{ $resume->personalInfo->status_id}}">
                                        {{ $resume->personalInfo->status->name }}

                                    </span>
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
                                        {{ $resume->personalInfo->job }}
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
                                        {{ $resume->personalInfo->phone }}
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
                                        {{ $resume->personalInfo->address }}
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
                        <form action="{{ route('frontend.resume.store_user_info') }}" method="POST">

                            {{ csrf_field() }}

                            @if(isset($resume))
                                <input type="hidden" name="resume_uid" value="{{ $resume->id }}">
                            @endif

                            <dl class="dl-horizontal">
                                <dt><strong>Your name </strong></dt>
                                <dd>
                                    <span id="name" class="editing">{{ $resume->user->name }}</span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Your ID </strong></dt>
                                <dd>
                                    <span id="email" class="editing">{{ $resume->user->email }}</span>

                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>
                                <hr>
                                <dt><strong>Date of birth </strong></dt>
                                <dd>
                                    <span id="dob" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Place of birth </strong></dt>
                                <dd>
                                    <span id="birth_place" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>


                                <hr>
                                <dt><strong>Marital Status </strong></dt>
                                <dd>
                                    <span id="status_id" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit_status"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Job </strong></dt>
                                <dd>
                                    <span id="job" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Phone Number </strong></dt>
                                <dd>
                                    <span id="phone" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
												</a>
											</span>
                                </dd>

                                <hr>
                                <dt><strong>Address </strong></dt>
                                <dd>
                                    <span id="address" class="editing"></span>
                                    <span>
												<a class="pull-right" href="#">
													<i class="fa fa-pencil edit"></i>
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
                    <form class="sky-form" id="sky-form4" action="#">
                        <dl class="dl-horizontal">
                            <dt>Username</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Username" name="username">
                                        <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Email address</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope"></i>
                                        <input type="email" placeholder="Email address" name="email">
                                        <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Enter your password</dt>
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
                                        <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                        </dl>
                        <label class="toggle toggle-change"><input type="checkbox" checked=""
                                                                   name="checkbox-toggle-1"><i class="no-rounded"></i>Remember
                            password</label>
                        <br>
                        <section>
                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I
                                    agree with the Terms and Conditions</a></label>
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
        $(document).on('click', '.edit', function () {
            var dom = $(this).parent().parent().parent().find('.editing');

            var edit = '';
            edit += '<input class="form-group" style="width: 70%; " name="' + dom.prop('id') + '" value="' + (dom.text()).trim() + '">';

            dom.html(edit);
            console.log(edit);


        });

        $(document).on('click', '.edit_status', function () {
            var dom = $(this).parent().parent().parent().find('.editing');
            console.log(dom.text());

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




                        {{--<select name="status_id" class="form-control col-md-7 col-xs-12" id="status">--}}
                        {{--@foreach( $marital_statuses as $marital_status)--}}
                        {{--<option value="{{ $marital_status->id }}">{{ $marital_status->name }}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}

                    }

                }

            });


        });

    </script>

@endsection