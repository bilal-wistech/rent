@extends('admin.template')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <h1>
                List Your Space
                <small>List Your Space</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">List Your Space</h3>
                        </div>

                        <!-- form start -->
                        <form id="add_pr" class="form-horizontal" method="post"
                            action="{{ url('admin/add-properties') }}" accept-charset="UTF-8">
                            {{ csrf_field() }}

                            <div class="box-body">
                                <input type="hidden" name="street_number" id="street_number">
                                <input type="hidden" name="route" id="route">
                                <input type="hidden" name="postal_code" id="postal_code">
                                <input type="hidden" name="state" id="state">
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">

                                <!-- Landlord -->
                                <div class="form-group row mt-2">
                                    <label class="control-label col-sm-3 fw-bold">Landlord <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control select2" name="host_id" id="host_id">
                                            <option value="">Select a Landlord</option>
                                            <option value="{{ old('host_id') }}" selected>{{ old('user_name') }}</option>
                                        </select>
                                        @if ($errors->has('host_id'))
                                            <p class="error-tag">{{ $errors->first('host_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#customerModal"
                                            class="btn btn-primary btn-sm"><span class="fa fa-user"></span></a>
                                    </div>
                                </div>

                                <!-- Home Type -->
                                <div class="form-group row mt-3">
                                    <label class="control-label col-sm-3 fw-bold">Home Type</label>
                                    <div class="col-sm-6">
                                        <select name="property_type_id" class="form-control f-14" id="property_type_id"
                                            required>
                                            <option value="">Select a Home Type</option>
                                            @foreach ($property_type as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('property_type_id'))
                                            <p class="error-tag">{{ $errors->first('property_type_id') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Room Type -->
                                <div class="form-group row mt-3">
                                    <label class="control-label col-sm-3 fw-bold">Room Type</label>
                                    <div class="col-sm-6">
                                        <select name="space_type" class="form-control f-14" required>
                                            <option value="">Select a Room Type</option>
                                            @foreach ($space_type as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('space_type'))
                                            <p class="error-tag">{{ $errors->first('space_type') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Accommodates -->
                                <div class="form-group row mt-3">
                                    <label class="control-label col-sm-3 fw-bold">Accommodates</label>
                                    <div class="col-sm-6">
                                        <select name="accommodates" class="form-control f-14" required>
                                            @for ($i = 1; $i <= 16; $i++)
                                                <option value="{{ $i }}">{{ $i == 16 ? $i . '+' : $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('accommodates'))
                                            <p class="error-tag">{{ $errors->first('accommodates') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="form-group row mt-3">
                                    <label class="control-label col-sm-3 fw-bold">Country</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="country" id="country">
                                            <option value="">Select a Country</option>
                                            @foreach ($countries as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <p id="errorCountry" />
                                        @if ($errors->has('country'))
                                            <p class="error-tag text-danger">{{ $errors->first('country') }}</p>
                                        @endif
                                    </div>
                                </div>


                                <!-- City -->
                                <div class="form-group row mt-2">
                                    <label class="control-label col-sm-3 fw-bold">City <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="city" id="city">
                                            <option value="">Select a City</option>
                                        </select>
                                        <p id="errorCity" />
                                        @if ($errors->has('city'))
                                            <p class="error-tag">{{ $errors->first('city') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" id="cityIcon" class="btn btn-primary btn-sm"><span
                                                class="fa fa-home"></span></a>
                                    </div>
                                </div>

                                <!-- Area -->
                                <div class="form-group row mt-3">
                                    <label class="control-label col-sm-3 fw-bold">Area <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="area" id="area">
                                            <option value="">Select a Area</option>
                                        </select>
                                        @if ($errors->has('area'))
                                            <p class="error-tag">{{ $errors->first('area') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" id="areaIcon" class="btn btn-primary btn-sm"><span
                                                class="fa fa-home"></span></a>
                                    </div>
                                </div>

                                <!-- Optional Building -->
                                <div class="form-group row mt-3 building d-none">
                                    <label class="control-label col-sm-3 fw-bold">Building <span
                                            class="text-danger">*</span></label>
                                    {{-- <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="building" name="building">
                                        @if ($errors->has('building'))
                                            <p class="error-tag">{{ $errors->first('building') }}</p>
                                        @endif
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="building" id="building">
                                            <option value="">Select a building</option>
                                        </select>
                                        @if ($errors->has('building'))
                                            <p class="error-tag">{{ $errors->first('building') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="#" id="buildingIcon" class="btn btn-primary btn-sm"><span
                                                class="fa fa-home"></span></a>
                                    </div>
                                </div>

                                <!-- Optional Flat No -->
                                <div class="form-group row mt-3 flat_no d-none">
                                    <label class="control-label col-sm-3 fw-bold">Flat No <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="flat_no" name="flat_no">
                                        @if ($errors->has('flat_no'))
                                            <p class="error-tag">{{ $errors->first('flat_no') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                <button type="submit" class="btn btn-info pull-right btn-sm text-white">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->

        <div class="modal fade" id="cityModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add City Form</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add_city_form" method="POST" action="{{ route('city.addAjax') }}"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="city_name" class="col-sm-3 control-label">City Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city_name" name="name"
                                            placeholder="City Name" required>
                                    </div>
                                </div>

                                <input type="hidden" id="modal_country" name="country" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add City</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="areaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="areaModalLabel">Add Area Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add_area_form" method="POST" action="{{ route('area.addAjax') }}"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="area_name" class="col-sm-3 col-form-label">Area Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="area_name" name="name"
                                            placeholder="Area Name" required>
                                    </div>
                                </div>
                                <input type="hidden" id="modal_city" name="city" value="">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Area</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="buildingModal" tabindex="-1" role="dialog" aria-labelledby="buildingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buildingModalLabel">Add Building Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="add_building_form" method="POST" action="{{ route('building.addAjax') }}"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="area_name" class="col-sm-3 col-form-label">Building</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="building_name" name="building"
                                            placeholder="Building Name" required>
                                    </div>
                                </div>
                                <input type="hidden" id="modal_area" name="area" value="">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Building</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="customerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="theModalLabel"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="signup_form" method="post" name="signup_form"
                            action="{{ url('admin/add-ajax-customer') }}" accept-charset='UTF-8'>
                            {{ csrf_field() }}

                            <h4 class="text-info text-center ml-40">Landlord Information</h4>
                            <input type="hidden" name="default_country" id="default_country" class="form-control">
                            <input type="hidden" name="carrier_code" id="carrier_code" class="form-control">
                            <input type="hidden" name="formatted_phone" id="formatted_phone" class="form-control">

                            <div class="form-group row mt-3">
                                <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">First
                                    Name<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control f-14" name="first_name" id="first_name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Last
                                    Name<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control f-14" name="last_name" id="last_name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Email<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control error f-14" name="email" id="email"
                                        placeholder="">
                                    <div id="emailError"></div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="exampleInputPassword1"
                                    class="control-label col-sm-3 mt-2 fw-bold">Phone</label>
                                <div class="col-sm-8">
                                    <input type="tel" class="form-control f-14" id="phone" name="phone">
                                    <span id="phone-error" class="text-danger"></span>
                                    <span id="tel-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="Password" class="control-label col-sm-3 mt-2 fw-bold">Password<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control f-14" name="password" id="password"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="exampleInputPassword1"
                                    class="control-label col-sm-3 mt-2 fw-bold">Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control f-14" name="status" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer mt-2">
                                <button type="submit" id="customerModalBtn"
                                    class="btn btn-info pull-left f-14">Submit</button>
                                <button class="btn btn-danger pull-left f-14" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('validate_script')
    <script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        let validEmailText = "Please enter a valid email address.";
        let checkUserURL = "{{ route('checkUser.check') }}";
        var token = "{{ csrf_token() }}";
        let emailExistText = "Email address is already Existed.";
        let validInternationalNumber = "Please enter a valid International Phone Number.";
        let numberExists = "The number has already been taken!";
        let signedUpText = "Sign Up..";
        let baseURL = "{{ url('/') }}";
        let duplicateNumberCheckURL = "{{ url('duplicate-phone-number-check') }}";
    </script>
    <script src="{{ asset('backend/js/add_customer_for_properties.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // Initialize select2 for country and city
            $('#country, #city').select2();

            $('#property_type_id').on('change', function() {
                let property_type_id = $(this).val();
                if (property_type_id == 1) {
                    $('.building').removeClass('d-none');
                    $('.flat_no').removeClass('d-none');
                } else {
                    $('.building').addClass('d-none');
                    $('.flat_no').addClass('d-none');
                }
            });

            $('#host_id').select2({
                ajax: {
                    url: '{{ route('admin.bookings.form_customer_search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || null,
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Select a Landlord',
                minimumInputLength: 0,
            });

            $('#country').on('change', function() {
                var selectedCountry = $(this).val();

                if (selectedCountry) {
                    $.ajax({
                        url: "{{ url('admin/properties/cities-by-country') }}/" + selectedCountry,
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
                        url: "{{ url('admin/properties/get-areas') }}/" + selectedCountry + '/' +
                            selectedCity,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.areas) {
                                $('#area').empty();
                                $('#area').append('<option value="">Select a Area</option>');
                                $.each(response.areas, function(key, area) {
                                    $('#area').append('<option value="' + area.id +
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
            $('#area').on('change', function() {
                var selectedCountry = $('#country').val();
                var selectedCity = $('#city').val();
                var selectedArea = $('#area').val();

                if (selectedCountry && selectedCity && selectedArea) {
                    $.ajax({
                        url: "{{ url('admin/properties/get-buildings') }}/" + selectedCountry +
                            '/' + selectedCity + '/' + selectedArea,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.buildings) {
                                $('#building').empty();
                                $('#building').append(
                                    '<option value="">Select a Building</option>');
                                $.each(response.buildings, function(key, building) {
                                    $('#building').append('<option value="' + building
                                        .id +
                                        '">' + building.name + '</option>');
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ', error);
                        }
                    });
                } else {
                    $('#building').empty().append('<option value="">Select a building</option>');
                }
            });

            $('#cityIcon').on('click', function(event) {
                event.preventDefault();
                $('#errorCountry').text('').removeClass('text-danger');

                var selectedCountry = $('#country').val();
                if (!selectedCountry) {

                    $('#errorCountry').text('Please select a country first.').addClass('text-danger');
                    return;
                }

                $('#modal_country').val(selectedCountry);
                $('#cityModal').modal('show');
            });



            $('#areaIcon').on('click', function(event) {
                event.preventDefault();

                $('#errorCountry').text('').removeClass('text-danger');

                var selectedCountry = $('#country').val();
                if (!selectedCountry) {

                    $('#errorCountry').text('Please select a country first.').addClass('text-danger');
                    return;
                }
                $('#errorCity').text('').removeClass('text-danger');

                var selectedCity = $('#city').val();
                if (!selectedCity) {

                    $('#errorCity').text('Please select a city first.').addClass('text-danger');
                    return;
                }

                // Populate hidden fields in the modal
                $('#modal_country').val(selectedCountry);
                $('#modal_city').val(selectedCity);

                // Show modal
                $('#areaModal').modal('show');
            });
            $('#buildingIcon').on('click', function(event) {
                event.preventDefault();

                $('#errorCountry').text('').removeClass('text-danger');
                $('#errorCity').text('').removeClass('text-danger');
                $('#errorArea').text('').removeClass('text-danger');

                var selectedCountry = $('#country').val();
                if (!selectedCountry) {
                    $('#errorCountry').text('Please select a country first.').addClass('text-danger');
                    return;
                }

                var selectedCity = $('#city').val();
                if (!selectedCity) {
                    $('#errorCity').text('Please select a city first.').addClass('text-danger');
                    return;
                }

                var selectedArea = $('#area').val();
                if (!selectedArea) {
                    $('#errorArea').text('Please select an area first.').addClass('text-danger');
                    return;
                }

                // Populate hidden fields in the modal
                $('#modal_country').val(selectedCountry);
                $('#modal_city').val(selectedCity);
                $('#modal_area').val(selectedArea); // Use selectedArea, not selectedCity

                // Show modal
                $('#buildingModal').modal('show');
            });
        });
    </script>
@endsection
