@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Bookings Edit Form</h1>
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
                        <form id="edit_booking" method="post" action="{{ route('admin.bookings.update', $booking->id) }}"
                            class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="booking_added_by" id="booking_added_by"
                                value="{{ Auth::guard('admin')->id() }}">
                            <div class="box-body">
                                <div class="form-group row mt-3 property_id">
                                    <label for="property_id"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Property <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="property_id" id="property_id" required>
                                            <option value="">Select a Property</option>
                                            @if (!empty($properties))
                                                @foreach ($properties as $property)
                                                    <option value="{{ $property->id }}"
                                                        {{ $property->id == $booking->property_id ? 'selected' : '' }}>
                                                        {{ $property->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">{{ $errors->first('property_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 checkin">
                                    <label for="startDate"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Check In <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="startDate" name="checkin" type="date"
                                            value="{{ old('checkin', $booking->start_date) }}" required>
                                        <span class="text-danger">{{ $errors->first('checkin') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 checkout">
                                    <label for="endDate"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Check Out <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="endDate" name="checkout" type="date"
                                            value="{{ old('checkout', $booking->end_date) }}" required>
                                        <span class="text-danger">{{ $errors->first('checkout') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 user_id">
                                    <label for="user_id"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Customer <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="user_id" id="user_id" required>
                                            <option value="">Select a Customer</option>
                                            @if (!empty($customers))
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        {{ $customer->id == $booking->user_id ? 'selected' : '' }}>
                                                        {{ $customer->first_name ?? '' }} {{ $customer->last_name ?? '' }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="number_of_guests"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Number of Guests
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="number_of_guests" name="number_of_guests" required>
                                            <option value="">Select Number of Guests</option>
                                            @if (!empty($maxGuests))
                                                @for ($i = 1; $i <= $maxGuests; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $i == $booking->guest ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            @endif
                                        </select>
                                        <span class="text-danger">{{ $errors->first('number_of_guests') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="booking_type"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Booking Type <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="booking_type" id="booking_type" required>
                                            <option value="instant"
                                                {{ old('booking_type', $booking->booking_type) == 'instant' ? 'selected' : '' }}>
                                                Instant</option>
                                            <option value="request"
                                                {{ old('booking_type', $booking->booking_type) == 'request' ? 'selected' : '' }}>
                                                Request</option>
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
                                            <option value="Accepted"
                                                {{ old('status', $booking->status) == 'Accepted' ? 'selected' : '' }}>
                                                Accepted</option>
                                            <option value="Pending"
                                                {{ old('status', $booking->status) == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Cancelled"
                                                {{ old('status', $booking->status) == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                            <option value="Declined"
                                                {{ old('status', $booking->status) == 'Declined' ? 'selected' : '' }}>
                                                Declined</option>
                                            <option value="Expired"
                                                {{ old('status', $booking->status) == 'Expired' ? 'selected' : '' }}>
                                                Expired</option>
                                            <option value="Processing"
                                                {{ old('status', $booking->status) == 'Processing' ? 'selected' : '' }}>
                                                Processing</option>
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
                                                {{ old('renewal_type', $booking->renewal_type) == 'weekly' ? 'selected' : '' }}>
                                                Weekly</option>
                                            <option value="monthly"
                                                {{ old('renewal_type', $booking->renewal_type) == 'monthly' ? 'selected' : '' }}>
                                                Monthly</option>
                                            <option value="none"
                                                {{ old('renewal_type', $booking->renewal_type) == 'none' ? 'selected' : '' }}>
                                                None</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('renewal_type') }}</span>
                                    </div>
                                </div>



                                <div class="box-footer">
                                    <button type="submit"
                                        class="btn btn-info btn-space f-14 text-white me-2">Update</button>
                                    <a class="btn btn-danger f-14" href="{{ route('admin.bookings.index') }}">Cancel</a>
                                </div>
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
    <script src="{{ asset('backend/js/property_customer_dropdown.min.js') }}"></script>
    <script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#property_id').select2();

            // Function to populate number of guests
            function populateNumberOfGuests(property_id, selected_guests = null) {
                $('#number_of_guests').empty().append('<option value="">Select Number of Guests</option>');

                if (property_id) {
                    // Generate the correct URL using Laravel route
                    let url = "{{ route('admin.bookings.get-number-of-guests', ':property_id') }}".replace(
                        ':property_id', property_id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let maxGuests = response.numberofguests;
                            for (let i = 1; i <= maxGuests; i++) {
                                $('#number_of_guests').append('<option value="' + i + '" ' + (
                                        selected_guests == i ? 'selected' : '') + '>' + i +
                                    '</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            }

            // Fetch number of guests when property changes
            $('#property_id').on('change', function() {
                let property_id = $(this).val();
                populateNumberOfGuests(property_id);
            });

            // Populate number of guests on page load based on existing booking
            let selectedPropertyId = $('#property_id').val();
            let selectedGuests =
                "{{ old('number_of_guests', $booking->guest) }}"; // Use old value or existing booking value
            populateNumberOfGuests(selectedPropertyId, selectedGuests);
        });
    </script>
@endsection
