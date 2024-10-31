@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">Location</h3>
                <ol class="breadcrumb float-end mb-4 mr-5"
                    style="font-size: 1rem; padding: 0.5rem 1rem; border-radius: 0.25rem; margin: 0; background-color: transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/dashboard') }}" class="text-dark">
                            <i class="fa fa-dashboard pr-1"></i> Home
                        </a>
                    </li>
                </ol>
            </section>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-3 settings_bar_gap">
                                @include('admin.common.property_bar')
                            </div>
                            <div class="col-md-9">
                                <form id="listing_location" method="post"
                                    action="{{ url('admin/listing/' . $result->id . '/' . $step) }}"
                                    class="signup-form login-form" accept-charset="UTF-8">
                                    @csrf
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <input type="hidden" name="latitude" id="latitude">
                                            <input type="hidden" name="longitude" id="longitude">

                                            <!-- Country Selection -->
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <label for="country" class="label-large fw-bold">Country <span
                                                            class="text-danger">*</span></label>
                                                    <select id="country" name="country" class="form-control f-14">
                                                        @foreach ($country as $key => $value)
                                                            <option value="{{ $key }}" {{ $key == $result->property_address->country ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                                </div>
                                            </div>

                                            <!-- Address Line 1 -->
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <label for="address_line_1" class="label-large fw-bold">Address Line
                                                        1 <span class="text-danger">*</span></label>
                                                    <input type="text" name="address_line_1" id="address_line_1"
                                                        value="{{ $result->property_address->address_line_1 }}"
                                                        class="form-control f-14"
                                                        placeholder="House name/number + street/road">
                                                    <span
                                                        class="text-danger">{{ $errors->first('address_line_1') }}</span>
                                                </div>
                                            </div>

                                            <!-- Map View -->
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <div id="map_view" style="width:100%; height:400px;"></div>
                                                    <small class="text-muted">You can move the pointer to set the
                                                        correct map position</small>
                                                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                                </div>
                                            </div>

                                            <!-- Additional Address Fields -->
                                            @php
                                                $addressFields = [
                                                    'address_line_2' => 'Address Line 2',
                                                    'area' => 'Area',
                                                    'building' => 'Building',
                                                    'flat_no' => 'Flat No',
                                                    'city' => 'City / Town / District',
                                                    'state' => 'State / Province / Region',
                                                    'postal_code' => 'ZIP / Postal Code'
                                                ];
                                            @endphp

                                            @foreach($addressFields as $field => $label)
                                                <div class="row mb-3">
                                                    <div class="col-md-8">
                                                        <label for="{{ $field }}"
                                                            class="label-large fw-bold">{{ $label }}{{ in_array($field, ['address_line_1', 'city', 'state']) ? ' *' : '' }}</label>
                                                        <input type="text" name="{{ $field }}" id="{{ $field }}"
                                                            value="{{ $result->property_address->$field ?? '' }}"
                                                            class="form-control f-14" {{ in_array($field, ['address_line_1', 'city', 'state']) ? 'required' : '' }}>
                                                        <span class="text-danger">{{ $errors->first($field) }}</span>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- Navigation Buttons -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ url('admin/listing/' . $result->id . '/description') }}"
                                                        class="btn btn-primary f-14">Back</a>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <button type="submit" class="btn btn-primary f-14">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    'use strict'
    var page = 'location';
    let fieldRequiredText = "{{ __('This field is required.') }}";
    let maxlengthText = "{{ __('Please enter no more than 255 characters.') }}";
    let latitude = "{{ $result->property_address->latitude != '' ? $result->property_address->latitude : 0 }}";
    let longitude = "{{ $result->property_address->longitude != '' ? $result->property_address->longitude : 0 }}";
</script>
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/listings.min.js') }}"></script>
@endsection