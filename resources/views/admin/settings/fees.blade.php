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

                            <div class="col-lg-10 col-12">
                                <div class="card pl-2 ">
                                    @if (Session::has('error'))
                                        <div class="error_email_settings">
                                            <div class="alert alert-warning fade in alert-dismissable">
                                                <strong>Warning!</strong> Whoops, there was an error. Please verify your
                                                information below.
                                                <a class="close" href="#" data-dismiss="alert" aria-label="close"
                                                    title="close">×</a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="card-header with-border">
                                        <h3 class="card-title">Fees Setting Form</h3>
                                        <span class="email_status">(<span class="text-green"><i class="fa fa-check"
                                                    aria-hidden="true"></i> Verified</span>)</span>
                                    </div>

                                    <form id="fees_setting" method="post" action="{{ url('admin/settings/fees') }}"
                                        class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="box-body">

                                            <div class="form-group row mt-3 guest_service_charge">
                                                <label for="guest_service_charge"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Guest service charge (%)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="guest_service_charge"
                                                        class="form-control f-14" id="guest_service_charge"
                                                        placeholder="Guest service charge (%)"
                                                        value="{{ $result['guest_service_charge'] }}">
                                                    <span
                                                        class="text-danger">{{ $errors->first("guest_service_charge") }}</span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small>Service charge of guest for booking</small>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3 iva_tax">
                                                <label for="iva_tax"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    I.V.A Tax (%)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="iva_tax" class="form-control f-14"
                                                        id="iva_tax" placeholder="I.V.A Tax (%)"
                                                        value="{{ $result['iva_tax'] }}">
                                                    <span class="text-danger">{{ $errors->first("iva_tax") }}</span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small>I.V.A Tax of guest for booking</small>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3 accomodation_tax">
                                                <label for="accomodation_tax"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Accommodation Tax (%)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="accomodation_tax" class="form-control f-14"
                                                        id="accomodation_tax" placeholder="Accommodation Tax (%)"
                                                        value="{{ $result['accomodation_tax'] }}">
                                                    <span
                                                        class="text-danger">{{ $errors->first("accomodation_tax") }}</span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small>Accommodation Tax of guest for booking</small>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="box-footer">
                                            <button type="submit"
                                                class="btn btn-info btn-space f-14 text-white me-2">Submit</button>
                                            <a class="btn btn-danger f-14"
                                                href="{{ url('admin/settings/country') }}">Cancel</a>
                                        </div>
                                    </form>
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