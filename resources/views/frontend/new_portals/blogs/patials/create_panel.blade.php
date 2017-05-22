<div class="headline headline-md">

    <ul class="nav nav-justified nav-tabs">
        <li class="active"><a data-toggle="tab" href="#profile">Create Post</a></li>
        <li><a data-toggle="tab" href="#passwordTab">Upload file/Photo</a></li>
    </ul>

</div>



<div class="tab-v1">

    <div class="tab-content">
        <div id="profile" class="profile-edit tab-pane fade in active">

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
                <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Remember password</label>
                <br>
                <section>
                    <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                </section>
                <button type="button" class="btn-u btn-u-default">Cancel</button>
                <button class="btn-u" type="submit">Save Changes</button>
            </form>
        </div>

        <div id="passwordTab" class="profile-edit tab-pane fade">


        </div>
    </div>
</div>
