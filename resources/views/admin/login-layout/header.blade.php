<body class="hold-transition login-page">
    <div class="">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class') }} text-center mb-0" role="alert">
                {{ Session::get('message') }}
                <a href="javaScript:void(0);" class="pull-right" data-dismiss="alert" aria-label="Close">&times;</a>
            </div>
        @endif
    </div>
    <div class="bg-custom">
<div class="logo-bg position-absolute">        <img alt="Logo" src="{{ asset('backend/assets/media/logos/zurent-logo-new.jpg') }}" class="logo-login" />

<p class='color-black-50 text-15'>Log in to find your next rental property or manage your listings with ease</p>
</div>

        <div class="login-box bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">

