
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

    <div class="login-box bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        {{-- <div class="login-logo">
            <a href="{{ url('/') }}" class="text-decoration-none fw-bolder"><strong>{{ siteName() }}</strong></a>
        </div> --}}
        <div class="login-box-body">
</div>
