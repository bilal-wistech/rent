@extends('admin.login-layout.template')

@section('main')

<h2 class="text-gray-900  mb-3 text-center mb-5 mt-5" style="
    font-weight: 600;
">Sign In</h2>
    <form action="{{ url('admin/authenticate') }}" method="post" id="admin_login">
    {{ csrf_field() }}

        <div class="form-group has-feedback mb-4">

            <div class="input-group fv-row mb-8 fv-plugins-icon-container">
                <input type="email" name="email" class="form-control p-2 rounded-2 input-custom" placeholder="{{ __('Email') }}" required>
            </div>
            @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>


        <div class="form-group has-feedback">

            <div class="input-group">
                <input type="password" name="password" class="form-control p-2 rounded-2  input-custom" placeholder="{{ __('Password') }}" required>
            </div>
            @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif

        </div>
        @if (!empty(settings('recaptcha_preference')) && !empty(settings('recaptcha_key')))
            @if (str_contains(settings('recaptcha_preference'), 'admin_login'))
                <div class="g-recaptcha mt-4" data-sitekey="{{ settings('recaptcha_key') }}"></div>
                @if ($errors->has('g-recaptcha-response'))
                        <p class="text-danger">{{ $errors->first('g-recaptcha-response') }}</p>
                @endif

            @endif
        @endif



                <div class="mt-3 text-14 text-right mb-3">
                    <a href="{{ url('admin/forgot-password') }}" class="forgot-password text-decoration-none text-white">{{ __('Forgot password?') }}</a>

            </div>
            <div class="row">
                <button type="submit" class="btn btn-success btn-custom btn-block btn-flat login rounded-2"><i class="spinner fa fa-spinner fa-spin d-none" ></i> {{ __('Sign In') }}</button>

        </div>
        <div class="d-flex justify-content-end">

        </div>
    </form>
@endsection


