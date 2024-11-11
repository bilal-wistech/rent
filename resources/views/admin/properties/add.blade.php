@extends('admin.template')
@section('main')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid"></div>
        <section class="content-header">
            <h3 class="mb-4 ml-4">
                List Your Space
                <small>List Your Space</small>
            </h3>

            <div class="ml-4 mr-4">
                @include('admin.common.breadcrumb')
            </div>
        </section>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="content">
                    <div class="row">
                        <!-- Right column -->
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="card box-info">
                                <div class="card-header with-border">
                                    <h3 class="card-title">List Your Space</h3>
                                </div>

                                <div class="card-body">
                                    <!-- Form start -->
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
                                                        <option value="{{ old('host_id') }}" selected>
                                                            {{ old('user_name') }}
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('host_id'))
                                                        <p class="error-tag">{{ $errors->first('host_id') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        id="Landlordbtn">
                                                        <span class="fa fa-user"></span>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Home Type -->
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold">Home Type</label>
                                                <div class="col-sm-6">
                                                    <select name="property_type_id" class="form-control f-14"
                                                        id="property_type_id" required>
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
                                                            <option value="{{ $i }}">{{ $i == 16 ? $i . '+' : $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('accommodates'))
                                                        <p class="error-tag">{{ $errors->first('accommodates') }}</p>
                                                    @endif
                                                </div>
                                            </div>

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
                                                    <p id="errorCity"></p>
                                                    @if ($errors->has('city'))
                                                        <p class="error-tag">{{ $errors->first('city') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#" id="cityIcon" class="btn btn-primary btn-sm">
                                                        <span class="fa fa-home"></span>
                                                    </a>

                                                </div>
                                            </div>

                                            <!-- Area -->
                                            <div class="form-group row mt-3">
                                                <label class="control-label col-sm-3 fw-bold">Area <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="area" id="area">
                                                        <option value="">Select an Area</option>
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
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control f-14" id="building"
                                                        name="building">
                                                    @if ($errors->has('building'))
                                                        <p class="error-tag">{{ $errors->first('building') }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Optional Flat No -->
                                            <div class="form-group row mt-3 flat_no d-none">
                                                <label class="control-label col-sm-3 fw-bold">Flat No <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control f-14" id="flat_no"
                                                        name="flat_no">
                                                    @if ($errors->has('flat_no'))
                                                        <p class="error-tag">{{ $errors->first('flat_no') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="reset" class="btn btn-info btn-sm">Reset</button>
                                            <button type="submit"
                                                class="btn btn-info pull-right btn-sm text-white float-right">Continue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- city Modal -->

<div class="modal fade" id="cityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add City Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="add_city_form" method="POST" action="{{ route('city.addAjax') }}" class="form-horizontal">
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
                        <button type="button" id="AddCityModal" class="btn btn-primary">Add City</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Lanlord Modal -->

<div class="modal" id="LandloardModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="theModalLabel"></h5>
                <button type="button" id="closebtn" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                            <input type="text" class="form-control f-14" name="last_name" id="last_name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Email<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control error f-14" name="email" id="email" placeholder="">
                            <div id="emailError"></div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Phone</label>
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
                        <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control f-14" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" id="LandloardModalBtn"
                            class="btn btn-sm btn-info pull-left f-14">Submit</button>
                        <!-- <button id="closebtn2" class="btn btn-danger pull-left f-14">Close</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Area Modal -->

<div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="areaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="areaModalLabel">Add Area Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_area_form" method="POST" action="{{ route('area.addAjax') }}" class="form-horizontal">
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
                        <button type="button" class="btn btn-primary" id="AreaModalbtn">Add Area</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script>
    var addCityUrl = "{{ route('city.addAjax') }}";
    var addAreaUrl = "{{ route('area.addAjax') }}";
    var csrfToken = "{{ csrf_token() }}"; 
</script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- for Landlord -->
<script>
    $(document).ready(function () {
        $('#Landlordbtn').on('click', function () {
            $('#LandloardModal').modal('show');
        });

        $('#closebtn').on('click', function () {
            $('#LandloardModal').modal('hide');
        });

        $('#closebtn2').on('click', function () {
            $('#LandloardModal').modal('hide');
        });

        $('#LandloardModalBtn').on('click', function (e) {
            e.preventDefault();

            let firstName = $('#first_name').val().trim();
            let lastName = $('#last_name').val().trim();
            let email = $('#email').val().trim();
            let password = $('#password').val().trim();

            if (!firstName || !lastName || !email || !password) {
                // Validation logic remains unchanged
                if (!firstName) {
                    $('#first_name').addClass('is-invalid');
                    $('#first_name').next('.error-message').remove();
                    $('#first_name').after('<span class="error-message text-danger">First name is required</span>');
                }
                if (!lastName) {
                    $('#last_name').addClass('is-invalid');
                    $('#last_name').next('.error-message').remove();
                    $('#last_name').after('<span class="error-message text-danger">Last name is required</span>');
                }
                if (!email) {
                    $('#email').addClass('is-invalid');
                    $('#email').next('.error-message').remove();
                    $('#email').after('<span class="error-message text-danger">Email is required</span>');
                }
                if (!password) {
                    $('#password').addClass('is-invalid');
                    $('#password').next('.error-message').remove();
                    $('#password').after('<span class="error-message text-danger">Password is required</span>');
                }
            } else {
                // Clear error messages and 'is-invalid' class
                $('.is-invalid').removeClass('is-invalid');
                $('.error-message').remove();
                let status = $('#status').val();
                let phone = $('#phone').val() ? $('#phone').val() : null;

                // Send the form data via AJAX
                $.post({
                    url: 'add-ajax-customer',
                    data: {
                        first_name: firstName,
                        last_name: lastName,
                        email: email,
                        status: status,
                        phone: phone,
                        password: password,
                        _token: $('input[name="_token"]').val() // CSRF token for Laravel
                    },
                    success: function (response) {
                        console.log('Customer added successfully:', response.user.id);
                        $('#LandloardModal').hide();

                        // Append the new option to the select box using the provided format
                        $("#host_id").append(
                            '<option data-icon-class="icon-star-alt" value="' +
                            response.user.id +
                            '" selected="selected">' +
                            response.user.first_name +
                            " " +
                            response.user.last_name +
                            "</option>"
                        );

                        // Trigger change event for Select2 to update its state
                        $('#host_id').trigger('change');
                        $('#LandloardModal').modal('hide');
                        // Reset the form fields after successful addition
                        $("#signup_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        console.log('Error:', error);
                        alert('Failed to add customer. Please try again.');
                    }
                });
            }
        });



    });

</script>

<!--  code for the city  -->
<script>
    $(document).ready(function () {
        $('#AddCityModal').on('click', function () {
            let City = $('#city_name').val().trim(); // Trim whitespace
            let country = $('#modal_country').val();
            // Clear previous error messages
            $('#city_name').removeClass('is-invalid');
            $('#city_name').next('.error-message').remove();

            if (!City) {
                // If the city name is empty, show an error message
                $('#city_name').addClass('is-invalid');
                $('#city_name').after('<span class="error-message text-danger">This field is required</span>');
            } else {
                // Send the city name to the server via AJAX
                $.post({
                    url: addCityUrl,
                    data: {
                        name: City,
                        country: country,
                        _token: csrfToken // Include CSRF token for security if required
                    },

                    success: function (response) {
                        // Handle successful response
                        if (response.city) { // Assuming your response has a success flag
                            $('#city_name').val(''); // Clear the input field
                            $('#modal_country').val(''); // Clear the input field
                            $('#cityModal').modal('hide'); // Close the modal if using Bootstrap
                            $("#city").append(
                                '<option data-icon-class="icon-star-alt" value="' +
                                response.city.id +
                                '" selected="selected">' +
                                response.city.name +
                                "</option>"
                            );
                        } else {
                            alert('Failed to add city: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle errors here
                        console.error('Error adding city:', error);
                        alert('An error occurred while adding the city. Please try again.');
                    }
                });
            }
        });
    });
</script>

<!-- code for area -->
<script>
    $(document).ready(function () {
        $('#AreaModalbtn').on('click', function () {
            let Area = $('#area_name').val().trim();
            let cityP = $('#modal_city').val();
            // Clear previous error messages
            $('#area_name').removeClass('is-invalid');
            $('#area_name').next('.error-message').remove();

            if (!Area) {
                // If the city name is empty, show an error message
                $('#area_name').addClass('is-invalid');
                $('#area_name').after('<span class="error-message text-danger">This field is required</span>');
            } else {
                // Send the city name to the server via AJAX
                $.post({
                    url: addAreaUrl,
                    data: {
                        name: Area,
                        city: cityP,
                        _token: csrfToken // Include CSRF token for security if required
                    },

                    success: function (response) {
                        //         // Handle successful response
                        if (response.area) { // Assuming your response has a success flag
                            $('#area_name').val(''); // Clear the input field
                            $('#modal_city').val(''); // Clear the input field
                            $('#areaModal').modal('hide'); // Close the modal if using Bootstrap
                            $("#area").append(
                                '<option data-icon-class="icon-star-alt" value="' +
                                response.area.id +
                                '" selected="selected">' +
                                response.area.name +
                                "</option>"
                            );

                        } else {
                            alert('Failed to add city: ' + response.message);
                        }
                        //     },
                        //     error: function (xhr, status, error) {
                        //         // Handle errors here
                        //         console.error('Error adding city:', error);
                        //         alert('An error occurred while adding the city. Please try again.');
                    }
                });
            }
        });
    });
</script>


@section('validate_script')
<!-- Load jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load Select2 library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
<script src="{{ asset('backend/js/add_customer_for_properties.min.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // Initialize select2 for country and city
        $('#country, #city , #area').select2();

        $('#property_type_id').on('change', function () {
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
                data: function (params) {
                    return {
                        term: params.term || null,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
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


        // $('#city').select2({
        //     ajax: {
        //         url: '{{ route('admin.bookings.form_area_search') }}',
        //         dataType: 'json',
        //         delay: 250,
        //         data: function (params) {
        //             // Get city and country IDs
        //             const cityId = $('#city_id').val();
        //             const countryId = $('#country_id').val();

        //             // If city_id or country_id is missing, return an empty object to cancel the request
        //             if (!cityId || !countryId) {
        //                 return {};
        //             }

        //             return {
        //                 term: params.term || null,
        //                 page: params.page || 1,
        //                 city_id: selectedCity,
        //                 country_id: selectedCountry
        //             };
        //         },
        //         processResults: function (data, params) {
        //             params.page = params.page || 1;

        //             return {
        //                 results: data.results,
        //                 pagination: {
        //                     more: data.pagination.more
        //                 }
        //             };
        //         },
        //         cache: true
        //     },
        //     placeholder: 'Select a Area',
        //     minimumInputLength: 0,
        // });

        $('#country').on('change', function () {
            var selectedCountry = $(this).val();

            if (selectedCountry) {
                $.ajax({
                    url: '/admin/properties/cities-by-country/' + selectedCountry,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.cities) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select a City</option>');
                            $.each(response.cities, function (key, city) {
                                $('#city').append('<option value="' + city.id +
                                    '">' + city.name + '</option>');
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('Error: ', error);
                    }
                });
            } else {
                $('#city').empty().append('<option value="">Select a City</option>');
            }
        });

        $('#city').on('change', function () {
            let selectedCountry = $('#country').val();
            let selectedCity = $('#city').val();

            if (selectedCountry && selectedCity) {
                // Check that both country and city are selected
                $.ajax({
                    url: '/admin/properties/get-areas/' + selectedCountry + '/' + selectedCity,
                    type: 'GET', // Use GET since we're retrieving data
                    success: function (response) {
                        // Check if response contains areas data
                        if (response.areas && response.areas.length > 0) {
                            $('#area').empty(); // Clear existing options
                            $('#area').append('<option value="">Select an Area</option>');

                            // Populate dropdown with new area data
                            $.each(response.areas, function (key, area) {
                                $('#area').append('<option value="' + area.name + '">' + area.name + '</option>');
                            });
                        } else {
                            console.warn("No areas found in the response");
                            $('#area').empty().append('<option value="">No areas available</option>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                        $('#area').empty().append('<option value="">Error loading areas</option>');
                    }
                });
            } else {
                console.warn("Please select both country and city");
                $('#area').empty().append('<option value="">Select an Area</option>');
            }
        });


        // if ($selectedCountry, $selectedCity) {
        //     $.ajax({
        //         url: AreaUrl,
        //         type: 'post',
        //         data: {
        //             country_code: selectedCountry,
        //             city_id: selectedCity,
        //         },
        //     });
        // }

        // });

        //Area
        // $('#city').on('change', function () {
        //     var selectedCountry = $('#country').val();
        //     var selectedCity = $('#city').val();

        //     if (selectedCountry && selectedCity) {
        //         $.ajax({
        //             url: AreaUrl,
        //             type: 'post',
        //             data: {
        //                 country_code: selectedCountry,
        //                 city_id: selectedCity,
        //             },
        //             // dataType: 'json',
        //             success: function (response) {
        //                 if (response.areas) {
        //                     $('#area').empty();
        //                     $('#area').append('<option value="">Select a Area</option>');
        //                     $.each(response.areas, function (key, area) {
        //                         $('#area').append('<option value="' + area.name +
        //                             '">' + area.name + '</option>');
        //                     });
        //                 }
        //             },
        //             error: function (xhr, status, error) {
        //                 console.log('Error: ', error);
        //             }
        //         });
        //     } else {
        //         $('#area').empty().append('<option value="">Select a Area</option>');
        //     }
        // });


        $('#cityIcon').on('click', function (event) {
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



        $('#areaIcon').on('click', function (event) {
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
    });
</script>
@endsection