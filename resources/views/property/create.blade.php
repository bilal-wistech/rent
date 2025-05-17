@extends('template')
@push('css')
    <link href="{{ asset('backend/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="mb-4 margin-top-85">
        <div class="row m-0">
            @include('users.sidebar')
            <div class="col-md-10  min-height">
                <div class="main-panel m-4 list-background border rounded-3">
                    <h3 class="text-center mt-5 text-24 font-weight-700">{{ __('List Your Space') }}</h3>
                    <p class="text-center text-16 pl-4 pr-4">
                        {{ __(':x Lets you make money renting out your place.', ['x' => siteName()]) }}</p>
                    <form id="list_space" method="post" action="{{ url('property/create') }}" class="mt-4" id="lys_form"
                        accept-charset='UTF-8'>
                        {{ csrf_field() }}
                        <input type="hidden" name='street_number' id='street_number'>
                        <input type="hidden" name='route' id='route'>
                        <input type="hidden" name='postal_code' id='postal_code'>
                        <input type="hidden" name='latitude' id='latitude'>
                        <input type="hidden" name='longitude' id='longitude'>
                        <div class="row p-4">
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('Home Type') }}</label>
                                    <select name="property_type_id" class="form-control text-16" id="property_type_id">
                                        <option value="">Select Home Type</option>
                                        @foreach ($property_type as $key => $value)
                                            <option data-icon-class="icon-star-alt" value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('property_type_id'))
                                        <p class="error-tag">{{ $errors->first('property_type_id') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('Room Type') }}</label>
                                    <select name="space_type" class="form-control text-16">
                                        <option value="">Select Room Type</option>
                                        @foreach ($space_type as $key => $value)
                                            <option data-icon-class="icon-star-alt" value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('space_type'))
                                        <p class="error-tag">{{ $errors->first('space_type') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('Country') }}</label>

                                    <select class="form-control select2" name="country" id="country">
                                        <option value="">Select a Country</option>
                                        @foreach ($countries as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country'))
                                        <p class="error-tag">{{ $errors->first('country') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('City') }}</label>

                                    <select class="form-control select2" name="city" id="city">

                                    </select>

                                    @if ($errors->has('city'))
                                        <p class="error-tag">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('Area') }}</label>

                                    <select class="form-control select2" name="area" id="area">

                                    </select>

                                    @if ($errors->has('area'))
                                        <p class="error-tag">{{ $errors->first('area') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 building d-none">
                                <div class="form-group mt-4">
                                    <label for="exampleInputPassword1">{{ __('Building') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control f-14" id="building" name="building">
                                    @if ($errors->has('building'))
                                        <p class="error-tag">{{ $errors->first('building') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 flat_no d-none">
                                <div class="form-group mt-4">
                                    <label for="exampleInputPassword1">{{ __('Flat No') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control f-14" id="flat_no" name="flat_no">
                                    @if ($errors->has('flat_no'))
                                        <p class="error-tag">{{ $errors->first('flat_no') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{ __('Accommodates') }}</label>
                                    <select name="accommodates" class="form-control text-16">
                                        @for ($i = 1; $i <= 16; $i++)
                                            <option class="accommodates" data-accommodates="{{ $i }}"
                                                value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('accommodates'))
                                        <p class="error-tag">{{ $errors->first('accommodates') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="float-right">
                                    <button type="submit"
                                        class="btn vbtn-outline-success text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 mt-4 mb-4"
                                        id="btn_next"> <i class="spinner fa fa-spinner fa-spin d-none"></i>
                                        <span id="btn_next-text">{{ __('Continue') }}</span>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('validation_script')
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        'use strict'
        let continueText = "{{ __('Continue') }}..";
        let fieldRequiredText = "{{ __('This field is required.') }}";
        let page = 'create';
    </script>

    <script type="text/javascript" src="{{ asset('js/propertycreate.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#country,#city,#area').select2();
            $('#property_type_id').on('change', function() {
                let property_type_id = $(this).val();
                if (property_type_id == "1") { // Ensure it's compared as a string
                    $('.building').removeClass('d-none');
                    $('.flat_no').removeClass('d-none');
                } else {
                    $('.building').addClass('d-none');
                    $('.flat_no').addClass('d-none');
                }
            });
            $('#country').on('change', function() {
                var selectedCountry = $(this).val();

                if (selectedCountry) {
                    $.ajax({
                        url: '/cities-by-country/' + selectedCountry,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.cities) {
                                $('#city').empty();
                                $('#city').append('<option value="">Select a City</option>');
                                $.each(response.cities, function(key, city) {
                                    $('#city').append('<option value="' + city.id +
                                        '">' + city.name + '</option>');
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ', error);
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Select a City</option>');
                }
            });
            //Area
            $('#city').on('change', function() {
                var selectedCountry = $('#country').val();
                var selectedCity = $('#city').val();

                if (selectedCountry && selectedCity) {
                    $.ajax({
                        url: '/get-areas/' + selectedCountry + '/' + selectedCity,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.areas) {
                                $('#area').empty();
                                $('#area').append('<option value="">Select a Area</option>');
                                $.each(response.areas, function(key, area) {
                                    $('#area').append('<option value="' + area.name +
                                        '">' + area.name + '</option>');
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ', error);
                        }
                    });
                } else {
                    $('#area').empty().append('<option value="">Select a Area</option>');
                }
            });
        });
    </script>
@endsection
