@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Bookings Add Form</h1>
            @include('admin.common.breadcrumb')
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box box-info">
                        @if (Session::has('error'))
                            <div class="error_email_settings">
                                <div class="alert alert-warning fade in alert-dismissable">
                                    <strong>Warning!</strong> Whoops there was an error. Please verify your below
                                    information. <a class="close" href="#" data-dismiss="alert" aria-label="close"
                                        title="close">×</a>
                                </div>
                            </div>
                        @endif
                        <div id="bookingMessage" class="mt-3"></div>
                        <form id="add_bookings" method="get" action="{{ route('admin.bookings.calander') }}"
                            class="form-horizontal">
                            <div class="box-body">

                                <div class="form-group row mt-3 property_id">
                                    <label for="property_id"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Property <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2-ajax" name="property_id" id="property_id">
                                            <option value="">Select a Property</option>
                                            <option value="{{ old('property_id') }}" selected>{{ old('property_name') }}
                                            </option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('property_id') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3 host_id">
                                    <label for="host_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Customer <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="user_id" id="host_id">
                                            <option value="">Select a Customer</option>
                                            <option value="{{ old('user_id') }}" selected>{{ old('user_name') }}</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#customerModal"
                                            class=" btn btn-primary btn-sm customer-modal"><span
                                                class="fa fa-user"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn-space f-14 text-white me-3">Proceed to
                                    Booking Calendar</button>
                                <a class="btn btn-danger f-14" href="{{ route('admin.bookings.index') }}">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
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

                            <h4 class="text-info text-center ml-40">Customer Information</h4>
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
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
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
            $('#property_id').select2({
                ajax: {
                    url: '{{ route('admin.bookings.form_property_search') }}',
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
                placeholder: 'Select a Property',
                minimumInputLength: 0,
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
                placeholder: 'Select a Customer',
                minimumInputLength: 0,
            });
        });
    </script>
@endsection
