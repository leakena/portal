@extends('frontend.layouts.master_portal')

@section('content')
    <div class="profile-body margin-bottom-20">
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                <li><a data-toggle="tab" href="#payment">Payment Options</a></li>
                <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
            </ul>
            <div class="tab-content">

                <div id="passwordTab" class="profile-edit tab-pane fade in active">
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


@endsection