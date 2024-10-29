@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/preferences.min.css') }}" rel="stylesheet" type="text/css" />
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
                            <!-- right column -->
                            <div class="col-lg-9 col-12">
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Preferences Setting Form</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <!-- Form Start -->
                                        <form id="preferencesform" method="post" action="{{ url('admin/settings/preferences') }}"
                                              class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group row mt-3">
                                                <label for="row_per_page" class="control-label col-sm-3 fw-bold text-md-end">
                                                    Row Per Page <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" name="row_per_page" id="row_per_page">
                                                        @foreach ($row_per_page as $key => $value)
                                                            <option value="{{ $key }}" {{ $result['row_per_page'] == $key ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- min_price --}}
                                            <div class="form-group row mt-3">
                                                <label for="min_price" class="control-label col-sm-3 fw-bold text-md-end">
                                                    Search Price (Min) <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" name="min_search_price"
                                                           value="{{ isset($result['min_search_price']) ? $result['min_search_price'] : 0 }}"
                                                           class="form-control f-14" id="min_price">
                                                    <small>In default currency</small>
                                                </div>
                                            </div>
                                            {{-- max_price --}}
                                            <div class="form-group row mt-3">
                                                <label for="max_price" class="control-label col-sm-3 fw-bold text-md-end">
                                                    Search Price (Max) <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number"
                                                           value="{{ isset($result['max_search_price']) ? $result['max_search_price'] : 1000 }}"
                                                           name="max_search_price" class="form-control f-14" id="max_price">
                                                    <small>In default currency & greater than min price</small>
                                                </div>
                                            </div>
                                            {{-- date_sepa --}}
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    Date Separator:
                                                </label>
                                                <div class="col-sm-6">
                                                    <select name="date_separator" class="form-control f-14">
                                                        <option value="-"
                                                            {{ isset($result['date_separator']) && $result['date_separator'] == '-' ? 'selected' : '' }}>
                                                            -
                                                        </option>
                                                        <option value="/"
                                                            {{ isset($result['date_separator']) && $result['date_separator'] == '/' ? 'selected' : '' }}>
                                                            /
                                                        </option>
                                                        <option value="."
                                                            {{ isset($result['date_separator']) && $result['date_separator'] == '.' ? 'selected' : '' }}>
                                                            .
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- date_format --}}
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    Date Format:
                                                </label>
                                                <div class="col-sm-6">
                                                    <select name="date_format" class="form-control f-14">
                                                        <option value="0" {{ isset($result['date_format']) && $result['date_format'] == 0 ? 'selected' : '' }}>
                                                            yyyymmdd {2019 12 31}
                                                        </option>
                                                        <option value="1" {{ isset($result['date_format']) && $result['date_format'] == 1 ? 'selected' : '' }}>
                                                            ddmmyyyy {31 12 2019}
                                                        </option>
                                                        <option value="2" {{ isset($result['date_format']) && $result['date_format'] == 2 ? 'selected' : '' }}>
                                                            mmddyyyy {12 31 2019}
                                                        </option>
                                                        <option value="3" {{ isset($result['date_format']) && $result['date_format'] == 3 ? 'selected' : '' }}>
                                                            ddMyyyy &nbsp;&nbsp;&nbsp;{31 Dec 2019}
                                                        </option>
                                                        <option value="4" {{ isset($result['date_format']) && $result['date_format'] == 4 ? 'selected' : '' }}>
                                                            yyyyMdd &nbsp;&nbsp;&nbsp;{2019 Dec 31}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    TimeZone
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" name="dflt_timezone" id="dflt_timezone">
                                                        @foreach ($timezones as $timezone)
                                                            <option value="{{ $timezone['zone'] }}"
                                                                {{ isset($result['dflt_timezone']) && $result['dflt_timezone'] == $timezone['zone'] ? 'selected' : '' }}>
                                                                {{ $timezone['diff_from_GMT'] . ' - ' . $timezone['zone'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    Google reCaptcha
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="recaptcha_preference form-control p-0 f-14 select2" multiple name="recaptcha_preference[]" id="recaptcha_preference">
                                                        <option value="disable">Disable</option>
                                                        <option value="user_login">User Login</option>
                                                        <option value="user_reg">User Registration</option>
                                                        <option value="admin_login">Admin Login</option>
                                                    </select>
                                                    <span>
                                                        <strong class="text-danger recaptchaError"></strong>
                                                    </span>
                                                    @if($errors->has('recaptcha_preference'))
                                                        <span class="help-block">
                                                            <strong class="text-danger">{{ $errors->first('recaptcha_preference') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- money_format --}}
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    Money Symbol Position:
                                                </label>
                                                <div class="col-sm-6">
                                                    <select name="money_format" class="form-control f-14 select2">
                                                        <option value="before" {{ isset($result['money_format']) && $result['money_format'] == 'before' ? 'selected' : '' }}>
                                                            Before { $500 }
                                                        </option>
                                                        <option value="after" {{ isset($result['money_format']) && $result['money_format'] == 'after' ? 'selected' : '' }}>
                                                            After { 500$ }
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold text-md-end" for="inputEmail3">
                                                    Property Approval:
                                                </label>
                                                <div class="col-sm-6">
                                                    <select name="property_approval" class="form-control f-14 select2">
                                                        <option value="Yes" {{ isset($result['property_approval']) && $result['property_approval'] == 'Yes' ? 'selected' : "" }}>
                                                            Yes
                                                        </option>
                                                        <option value="No" {{ isset($result['property_approval']) && $result['property_approval'] == 'No' ? 'selected' : "" }}>
                                                            No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-3">
                                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </form>
                                        <!-- /.form -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Select Options'
        });
    });
</script>
@endpush
