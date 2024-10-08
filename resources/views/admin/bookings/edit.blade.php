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
                            <input type="hidden" name="booking_type" id="booking_type"
                                value="{{ $booking->booking_type }}">
                            <input type="hidden" name="status" id="status" value="{{ $booking->status }}">
                            <div class="box-body">
                                <div class="form-group row mt-3 property_id">
                                    <label for="property_id"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Property <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="property_id" id="property_id" required>
                                            <option value="">Select a Property</option>
                                            @if ($booking->property_id)
                                                <option value="{{ $booking->property_id }}" selected>
                                                    {{ $booking->properties->name }}</option>
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
                                            @if ($booking->user_id)
                                                <option value="{{ $booking->user_id }}" selected>
                                                    {{ $booking->users->first_name ?? '' }}
                                                    {{ $booking->users->last_name ?? '' }}</option>
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
                                <div class="form-group row mt-3 renewal_type">
                                    <label for="renewal_type"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                        Renewal Type <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <select class="form-control select2" name="renewal_type" id="renewal_type">
                                            <option value="">Select a Renewal Type</option>
                                            <option value="none"
                                                {{ old('renewal_type', $booking->renewal_type) == 'none' ? 'selected' : '' }}>
                                                None</option>
                                            <option value="weekly"
                                                {{ old('renewal_type', $booking->renewal_type) == 'weekly' ? 'selected' : '' }}>
                                                Weekly</option>
                                            <option value="monthly"
                                                {{ old('renewal_type', $booking->renewal_type) == 'monthly' ? 'selected' : '' }}>
                                                Monthly</option>
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

                templateResult: function(item) {
                    return item.text;
                },
                templateSelection: function(item) {
                    return item.text;
                }
            });
            var existingPropertyId = "{{ old('property_id', $booking->property_id) }}";
            if (existingPropertyId) {
                $('#property_id').val(existingPropertyId).trigger('change');
            }

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

                templateResult: function(item) {
                    return item.text;
                },
                templateSelection: function(item) {
                    return item.text;
                }
            });
            var existingUserId = "{{ old('user_id', $booking->user_id) }}";
            if (existingUserId) {
                $('#user_id').val(existingUserId).trigger('change');
            }

            function populateNumberOfGuests(property_id, selected_guests = null) {
                $('#number_of_guests').empty().append('<option value="">Select Number of Guests</option>');

                if (property_id) {
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

            $('#property_id').on('change', function() {
                let property_id = $(this).val();
                populateNumberOfGuests(property_id);
            });

            let selectedPropertyId = $('#property_id').val();
            let selectedGuests =
                "{{ old('number_of_guests', $booking->guest) }}";
            populateNumberOfGuests(selectedPropertyId, selectedGuests);
        });
    </script>
@endsection
