@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-2 col-12 settings_bar_gap">
                                @include('admin.common.settings_bar')
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="card box-info">
                                    <div class="card-header">
                                        <h3 class="card-title">API Credentials Form</h3>
                                        <span class="email_status">
                                            (<span class="text-green"><i class="fa fa-check" aria-hidden="true"></i> Verified</span>)
                                        </span>
                                    </div>

                                    <div class="card-body">
                                        @if (Session::has('error'))
                                            <div class="error_email_settings">
                                                <div class="alert alert-warning fade in alert-dismissable">
                                                    <strong>Warning!</strong> Whoops, there was an error. Please verify your information below.
                                                    <a class="close" href="#" data-dismiss="alert" aria-label="close" title="close">×</a>
                                                </div>
                                            </div>
                                        @endif

                                        <form id="api_credentials" method="post" action="{{ url('admin/settings/api-informations') }}" class="form-horizontal">
                                            {{ csrf_field() }}

                                            <div class="form-group row mt-3">
                                                <label for="facebook_client_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Facebook Client ID <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="facebook_client_id" class="form-control f-14" id="facebook_client_id" placeholder="Facebook Client ID" value="{{ $facebook['client_id'] }}">
                                                    <span class="text-danger">{{ $errors->first("facebook_client_id") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="facebook_client_secret" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Facebook Client Secret <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="facebook_client_secret" class="form-control f-14" id="facebook_client_secret" placeholder="Facebook Client Secret" value="{{ $facebook['client_secret'] }}">
                                                    <span class="text-danger">{{ $errors->first("facebook_client_secret") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="google_client_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Google Client ID <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="google_client_id" class="form-control f-14" id="google_client_id" placeholder="Google Client ID" value="{{ $google['client_id'] }}">
                                                    <span class="text-danger">{{ $errors->first("google_client_id") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="google_client_secret" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Google Client Secret <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="google_client_secret" class="form-control f-14" id="google_client_secret" placeholder="Google Client Secret" value="{{ $google['client_secret'] }}">
                                                    <span class="text-danger">{{ $errors->first("google_client_secret") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="google_map_key" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Google Map Browser Key <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="google_map_key" class="form-control f-14" id="google_map_key" placeholder="Google Map Browser Key" value="{{ $google_map }}">
                                                    <span class="text-danger">{{ $errors->first("google_map_key") }}</span>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>
                                                <a class="btn btn-danger f-14" href="{{ url('admin/settings/social-links') }}">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validate_script')
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endsection
