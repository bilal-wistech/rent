@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .card {
            max-width: 700px; /* Adjust the card width as needed */
            margin: auto; /* Center the card */
        }
    </style>
@endpush

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-12 ml-4 settings_bar_gap settings-bar"> <!-- Apply custom class here -->
                        @include('admin.common.settings_bar')
                    </div>
                    <div id="kt_app_content" class="app-content flex-column-fluid col-lg-8 col-12"> <!-- Adjusted card width -->
                        <div id="kt_app_content_container" class="app-container container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Google reCaptcha API Credentials Form</h3>
                                    <span class="email_status">(<span class="text-green"><i class="fa fa-check" aria-hidden="true"></i> Verified</span>)</span>
                                </div>
                                <div class="card-body">
                                    @if (Session::has('error'))
                                        <div class="alert alert-warning fade in alert-dismissable">
                                            <strong>Warning!</strong> Whoops, there was an error. Please verify your information below. 
                                            <a class="close" href="#" data-dismiss="alert" aria-label="close" title="close">×</a>
                                        </div>
                                    @endif

                                    <form id="google_recaptcha_api_credentials" method="post" action="{{ url('admin/settings/google-recaptcha-api-information') }}" class="form-horizontal">
                                        {{ csrf_field() }}

                                        <div class="form-group row mt-3">
                                            <label for="google_recaptcha_key" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">reCaptcha Key <span class="text-danger">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" name="google_recaptcha_key" class="form-control f-14" id="google_recaptcha_key" placeholder="Enter Google reCaptcha Key" value="{{ old('google_recaptcha_key', settings('recaptcha_key')) }}">
                                                <span class="text-danger">{{ $errors->first("google_recaptcha_key") }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="google_recaptcha_secret" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">reCaptcha Secret <span class="text-danger">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" name="google_recaptcha_secret" class="form-control f-14" id="google_recaptcha_secret" placeholder="Enter Google reCaptcha Secret" value="{{ old('google_recaptcha_secret', settings('recaptcha_secret')) }}">
                                                <span class="text-danger">{{ $errors->first("google_recaptcha_secret") }}</span>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-space f-14 text-white me-2 reCaptcha_submit">Submit</button>
                                    <a class="btn btn-danger f-14" href="{{ url('admin/settings/social-links') }}">Cancel</a>
                                </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('validate_script')
<script>
    var selectedRecaptchaPlace = '';
    var recaptchaPlaceholder = '';
</script>
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/googlereCaptcha.min.js') }}"></script>
@endsection
