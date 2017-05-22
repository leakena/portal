@extends('frontend.layouts.auth_master')

@section('content')

    <div class="reg-block">
        <div class="reg-block-header">
            <h2>ITC-Student-Portal</h2>
            <ul class="social-icons text-center">
                <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>
                <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="#"></a></li>
                <li><a class="rounded-x social_googleplus" data-original-title="Google Plus" href="#"></a></li>
                <li><a class="rounded-x social_linkedin" data-original-title="Linkedin" href="#"></a></li>
            </ul>
            <p> Sign up with your Identification and birth date as password!</p>
        </div>

        {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {{ Form::input('text', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}

            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
            </div>
            <hr>

            <div class="checkbox">
                <label>
                    {{ Form::checkbox('remember') }}
                    <p>{{ trans('labels.frontend.auth.remember_me') }}</p>
                </label>
                <label for="">
                    {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                </label>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn-u btn-block']) }}
                </div>

            </div>
        {{ Form::close() }}
    </div>

@endsection
