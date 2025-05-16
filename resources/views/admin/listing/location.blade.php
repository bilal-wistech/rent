@extends('admin.template')
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Location
                <small>Location</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a>
                </li>
            </ol>
        </section>
        <section class="content">
            <div class="row gap-2">
                <div class="col-md-3 settings_bar_gap">
                    @include('admin.common.property_bar')
                </div>

                <div class="col-md-9">
                    <form id="listing_location" method="post"
                        action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form'
                        accept-charset='UTF-8'>
                        {{ csrf_field() }}
                        <div class="box box-info">
                            <div class="box-body">
                                <input type="hidden" name='latitude' id='latitude'>
                                <input type="hidden" name='longitude' id='longitude'>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">Country <span
                                                class="text-danger">*</span></label>
                                        <select id="country" name="country" class="form-control f-14 select2">
                                            @foreach ($country as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $result->property_address->country ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">City / Town / District <span
                                                class="text-danger">*</span></label>
                                        <select name="city" class="form-control f-14 select2" id='city'>
                                            @foreach ($city as $key => $value)
                                                <option value="{{ $value }}"
                                                    {{ $value == $result->property_address->city ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">Area</label>
                                        <select name="area" class="form-control f-14 select2" id='area'>
                                            @foreach ($area as $key => $value)
                                                <option value="{{ $value }}"
                                                    {{ $value == $result->property_address->area ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('area') }}</span>
                                    </div>
                                </div>
                                @if ($result->property_type_id != 1)
                                    <div class="row">
                                        <div class="col-md-8 mb20">
                                            <label class="label-large fw-bold">Building</label>
                                            <select name="building" class="form-control f-14 select2" id='building'>
                                                @foreach ($building as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ $value == $result->property_address->building ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('building') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mb20">
                                            <label class="label-large fw-bold">Flat No</label>
                                            <input type="text" name="flat_no" id="flat_no"
                                                value="{{ $result->property_address->flat_no }}" class="form-control f-14">
                                            <span class="text-danger">{{ $errors->first('flat_no') }}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">State / Province / Country / Region <span
                                                class="text-danger">*</span></label>

                                        <select name="state" class="form-control f-14 select2" id='state'>
                                            @foreach ($country as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if ($key == ($result->property_address->state ?? ($result->property_address->country ?? ''))) selected @endif>
                                                    {{ $key }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">ZIP / Postal Code</label>
                                        <input type="text" name="postal_code" id="postal_code"
                                            value="{{ $result->property_address->postal_code }}" class="form-control f-14">
                                        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <a data-prevent-default=""
                                            href="{{ url('admin/listing/' . $result->id . '/description') }}"
                                            class="btn btn-large btn-primary f-14">Back</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn btn-large btn-primary next-section-button f-14">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
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
    <script>
        $(document).ready(function() {
            $('#country, #city, #area, #building, #state').select2();
        });
    </script>
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/listings.min.js') }}"></script>
@endsection
