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
                        <form id="add_bookings" method="post" action="{{ route('admin.bookings.store') }}"
                            class="form-horizontal">
                            @csrf

                            <input type="hidden" name="booking_added_by" id="booking_added_by"
                                value="{{ Auth::guard('admin')->id() }}">

                            <div class="box-body">

                                <div class="form-group row mt-3 property_id">
                                    <label for="property_id"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Property <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2-ajax" name="property_id" id="property_id">
                                            <option value="">Select a Property</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('property_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 checkin">
                                    <label for="startDate" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Check In <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <input class="form-control" id="startDate" name="checkin" type="date"
                                            value="{{ old('checkin') }}" required>
                                        <span class="text-danger">{{ $errors->first('checkin') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 checkout">
                                    <label for="endDate" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Check Out <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <input class="form-control" id="endDate" name="checkout" type="date"
                                            value="{{ old('checkout') }}" required>
                                        <span class="text-danger">{{ $errors->first('checkout') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 user_id">
                                    <label for="user_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Customer <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="user_id" id="user_id">
                                            <option value="">Select a Customer</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 number_of_guests">
                                    <label for="number_of_guests"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Number of Guests <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="number_of_guests" id="number_of_guests">
                                            <option value="">Select Number of Guests</option>
                                            <!-- Assuming number of guests is dynamically generated -->
                                            <option value="1" {{ old('number_of_guests') == 1 ? 'selected' : '' }}>1
                                            </option>
                                            <option value="2" {{ old('number_of_guests') == 2 ? 'selected' : '' }}>2
                                            </option>
                                            <!-- Add more options as necessary -->
                                        </select>
                                        <span class="text-danger">{{ $errors->first('number_of_guests') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 booking_type">
                                    <label for="booking_type"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Booking Type <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="booking_type" id="booking_type">
                                            <option value="">Select a Booking Type</option>
                                            <option value="instant"
                                                {{ old('booking_type') == 'instant' ? 'selected' : '' }}>Instant</option>
                                            <option value="request"
                                                {{ old('booking_type') == 'request' ? 'selected' : '' }}>Request</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('booking_type') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 status">
                                    <label for="status" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Booking Status <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="">Select a Status</option>
                                            <option value="Accepted" {{ old('status') == 'Accepted' ? 'selected' : '' }}>
                                                Accepted</option>
                                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Cancelled"
                                                {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            <option value="Declined" {{ old('status') == 'Declined' ? 'selected' : '' }}>
                                                Declined</option>
                                            <option value="Expired" {{ old('status') == 'Expired' ? 'selected' : '' }}>
                                                Expired</option>
                                            <option value="Processing"
                                                {{ old('status') == 'Processing' ? 'selected' : '' }}>Processing</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 renewal_type">
                                    <label for="renewal_type"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Renewal Type <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="renewal_type" id="renewal_type">
                                            <option value="">Select a Renewal Type</option>
                                            <option value="weekly"
                                                {{ old('renewal_type') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="monthly"
                                                {{ old('renewal_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            <option value="none" {{ old('renewal_type') == 'none' ? 'selected' : '' }}>
                                                None</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('renewal_type') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>
                                <a class="btn btn-danger f-14" href="{{ route('admin.bookings.index') }}">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('validate_script')
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
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

            $('#user_id').select2({
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

            $('#property_id').on('change', function() {
                let property_id = $(this).val();

                $('#number_of_guests').empty().append('<option value="">Select Number of Guests</option>');

                if (property_id) {
                    $.ajax({
                        url: 'get-number-of-guests/' + property_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let maxGuests = response.numberofguests;
                            for (let i = 1; i <= maxGuests; i++) {
                                $('#number_of_guests').append('<option value="' + i + '">' + i +
                                    '</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
