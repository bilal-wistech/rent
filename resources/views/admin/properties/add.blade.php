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
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form id="add_pr" class="form-horizontal" method="post"
                            action="{{ url('admin/add-properties') }}" id="lys_form" accept-charset='UTF-8'>
                            {{ csrf_field() }}

                            <div class="box-body">
                                <input type="hidden" name='street_number' id='street_number'>
                                <input type="hidden" name='route' id='route'>
                                <input type="hidden" name='postal_code' id='postal_code'>
                                <input type="hidden" name='state' id='state'>
                                <input type="hidden" name='latitude' id='latitude'>
                                <input type="hidden" name='longitude' id='longitude'>

                                <div class="form-group row mt-2">
                                    <label for="exampleInputEmail1" class="control-label col-sm-3 mt-2 fw-bold">Landlord
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-4" id="respo">
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
                                            class=" btn btn-primary btn-sm customer-modal"><span
                                                class="fa fa-user"></span></a>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="exampleInputEmail1" class="control-label col-sm-3 mt-2 fw-bold">Home
                                        Type</label>
                                    <div class="col-sm-6">
                                        <select name="property_type_id" class="form-control f-14" id="property_type_id"
                                            required>
                                            <option data-icon-class="icon-star-alt">
                                                Select a Home Type
                                            </option>
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

                                <div class="form-group row mt-3">
                                    <label for="exampleInputEmail1" class="control-label col-sm-3 mt-2 fw-bold">Room
                                        Type</label>
                                    <div class="col-sm-6">
                                        <select name="space_type" class="form-control f-14" required>
                                            <option data-icon-class="icon-star-alt">
                                                Select a Room Type
                                            </option>
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
                                <div class="form-group row mt-3">
                                    <label for="exampleInputEmail1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Accommodates</label>
                                    <div class="col-sm-6">
                                        <select name="accommodates" class="form-control f-14" required>
                                            @for ($i = 1; $i <= 16; $i++)
                                                <option class="accommodates"
                                                    data-accommodates="{{ $i == '16' ? $i . '+' : $i }}"
                                                    value="{{ $i == '16' ? $i . '+' : $i }}">
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('accommodates'))
                                            <p class="error-tag">{{ $errors->first('accommodates') }}</p>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Property
                                        Name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="name" name="name"
                                            placeholder="" required>
                                        @if ($errors->has('name'))
                                            <p class="error-tag">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="form-group row mt-3">
                                    <label for="exampleInputEmail1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Country</label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="country" id="country">
                                            <option data-icon-class="icon-star-alt">
                                                Select a Country
                                            </option>
                                            @foreach ($countries as $key => $value)
                                                <option data-icon-class="icon-star-alt" value="{{ $key }}">
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <p class="error-tag">{{ $errors->first('country') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="exampleInputEmail1" class="control-label col-sm-3 mt-2 fw-bold">City
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6" id="">
                                        <select class="form-control select2" name="city" id="city">
                                            <option value="">Select a City</option>

                                        </select>
                                        @if ($errors->has('city'))
                                            <p class="error-tag">{{ $errors->first('city') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Area
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="area" name="area"
                                            placeholder="" required>
                                        @if ($errors->has('area'))
                                            <p class="error-tag">{{ $errors->first('area') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-3 building d-none">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Building
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="building" name="building"
                                            placeholder="">
                                        @if ($errors->has('building'))
                                            <p class="error-tag">{{ $errors->first('building') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-3 flat_no d-none">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Flat No
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" id="flat_no" name="flat_no"
                                            placeholder="">
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
        <!-- /.content -->

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
    <script src="{{ asset('backend/js/add_customer_for_properties.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#property_type_id').on('change', function() {
                // console.log($(this).val());
                let property_type_id = $(this).val();
                if (property_type_id == 1) {
                    $('.building').removeClass('d-none');
                    $('.flat_no').removeClass('d-none');
                } else {
                    $('.building').addClass('d-none');
                    $('.flat_no').addClass('d-none');
                }
            });
            $('#country, #city').select2();
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
                        url: '/admin/properties/cities-by-country/' +
                        selectedCountry,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.cities) {
                                $('#city').empty();

                                $('#city').append('<option value="">Select a City</option>');

                                $.each(response.cities, function(key, city) {
                                    $('#city').append('<option value="' + city.name +
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
        });
    </script>
@endsection
