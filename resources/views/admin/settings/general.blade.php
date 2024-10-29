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
                            <div class="col-lg-3 col-12 settings_bar_gap">
                                @include('admin.common.settings_bar')
                            </div>

                            <div class="col-lg-9 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">General Settings</h3>
                                        <span class="email_status float-end">(<span class="text-green"><i class="fa fa-check" aria-hidden="true"></i> Verified</span>)</span>
                                    </div>
                                    
                                    <div class="card-body">
                                        @if (Session::has('error'))
                                            <div class="alert alert-warning fade in alert-dismissable">
                                                <strong>Warning!</strong> Whoops, there was an error. Please verify your information below.
                                                <a class="close" href="#" data-dismiss="alert" aria-label="close" title="close">×</a>
                                            </div>
                                        @endif

                                        <form id="general_form" method="post" action="{{ url('admin/settings') }}" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="mb-3 row">
                                                <label for="name" class="col-sm-3 col-form-label fw-bold">Name <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', $result['name']) }}">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="email" class="col-sm-3 col-form-label fw-bold">Email <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', $result['email']) }}">
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="photos[logo]" class="col-sm-3 col-form-label fw-bold">Logo <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="file" name="photos[logo]" class="form-control" id="photos[logo]">
                                                    <span class="text-danger">{{ $errors->first('photos.logo') }}</span>
                                                    <br> {!! getLogo('file-img') !!}
                                                    <input type="hidden" id="hidden_company_logo" name="hidden_company_logo" value="{{ $result['logo'] }}">
                                                    <span name="mySpan" class="remove_logo_preview" id="mySpan"></span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small>{{ $field['hint'] ?? '' }}</small>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="photos[favicon]" class="col-sm-3 col-form-label fw-bold">Favicon <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="file" name="photos[favicon]" class="form-control" id="photos[favicon]">
                                                    <span class="text-danger">{{ $errors->first('photos.favicon') }}</span>
                                                    <br> {!! getFavicon('file-img') !!}
                                                    <input type="hidden" id="hidden_company_favicon" name="hidden_company_favicon" value="{{ $result['favicon'] }}">
                                                    <span name="mySpan2" class="remove_favicon_preview" id="mySpan2"></span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <small>{{ $field['hint'] ?? '' }}</small>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="head_code" class="col-sm-3 col-form-label fw-bold">Head Code <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <textarea name="head_code" id="head_code" rows="3" class="form-control">{{ old('head_code', $result['head_code']) }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('head_code') }}</span>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="default_currency" class="col-sm-3 col-form-label fw-bold">Default Currency</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="default_currency" name="default_currency">
                                                        @foreach ($currency as $key => $item)
                                                            <option value="{{ $key }}" {{ $result['default_currency'] == $key ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('default_currency') }}</span>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="default_language" class="col-sm-3 col-form-label fw-bold">Default Language</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="default_language" name="default_language">
                                                        @foreach ($language as $key => $item)
                                                            <option value="{{ $key }}" {{ $result['default_language'] == $key ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('default_language') }}</span>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                        <a class="btn btn-danger" href="{{ url('admin/settings') }}">Cancel</a>
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
<script type="text/javascript">
    'use strict';
    var message = "{{ __('The file must be an image (jpg, jpeg, png or gif)') }}";
    var message_ico = "{{ __('The file must be an image (jpg, jpeg, png or ico)') }}";
</script>
<script type="text/javascript" src="{{ asset('backend/js/additional-method.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/backend.min.js') }}"></script>
@endsection
