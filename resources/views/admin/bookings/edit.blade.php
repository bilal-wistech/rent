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
                        <form method="post" action="{{ route('admin.bookings.store') }}" class='form-horizontal'
                            id='booking_form'>
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Form Column -->
                                    <div class="col-md-7">
                                        <p class="calendar-m-msg" id="model-message"></p>
                                        <!-- Hidden inputs -->
                                        <input type="hidden" name="booking_id" id="booking_id">
                                        <input type="hidden" name="property_id" id="propertyId" value="">
                                        <input type="hidden" name="min_stay" value="1">
                                        <input type="hidden" name="booking_added_by" id="booking_added_by"
                                            value="{{ Auth::guard('admin')->id() }}">
                                        <input type="hidden" name="booking_type" value="instant" id="booking_type">
                                        <input type="hidden" name="status" value="pending" id="booking_status">

                                        <!-- User ID Selection -->
                                        <div class="form-group row mt-3 user_id">
                                            <label for="user_id"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Customer <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="user_id" id="user_id">
                                                    <option value="">Select a Customer</option>
                                                    <option value="{{ old('user_id') }}" selected>
                                                        {{ old('user_name') }}</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    id="addCustomerButton">
                                                    <span class="fa fa-user"></span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Pricing Selection -->
                                        <div class="form-group row mt-3 pricing_type_id">
                                            <label for="pricing_type_id"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Pricing <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control select2" name="pricing_type_id"
                                                    id="pricing_type_id">
                                                    <option value="">Select Pricing</option>
                                                </select>
                                                <span class="text-danger"
                                                    id="error-pricing_type_id">{{ $errors->first('pricing_type_id') }}</span>
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="form-group row mt-3">
                                            <label for="start_date"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Start Date <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control f-14" name="start_date"
                                                    id="start_date"
                                                    value="{{ isset($booking) ? \Carbon\Carbon::parse($booking->start_date)->format('d-m-Y') : old('start_date') }}">
                                                <span class="text-danger"
                                                    id="error-start_date">{{ $errors->first('start_date') }}</span>
                                            </div>
                                        </div>

                                        <!-- End Date -->
                                        <div class="form-group row mt-3">
                                            <label for="end_date"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                End Date <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control f-14" name="end_date"
                                                    id="end_date"
                                                    value="{{ isset($booking) ? \Carbon\Carbon::parse($booking->end_date)->format('d-m-Y') : old('end_date') }}">
                                                <span class="text-danger"
                                                    id="error-end_date">{{ $errors->first('end_date') }}</span>
                                            </div>
                                        </div>

                                        <!-- Number of Guests -->
                                        <div class="form-group row mt-3 number_of_guests">
                                            <label for="number_of_guests"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Number of Guests <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control select2" name="number_of_guests"
                                                    id="number_of_guests">
                                                    <option value="">Select Number of Guests</option>
                                                    <option value="{{ old('number_of_guests') }}" selected>
                                                        {{ old('number_of_guests') }}</option>
                                                </select>
                                                <span class="text-danger"
                                                    id="error-number_of_guests">{{ $errors->first('number_of_guests') }}</span>
                                            </div>
                                        </div>

                                        <!-- Renewal Type -->
                                        <div class="form-group row mt-3 renewal_type">
                                            <label for="renewal_type"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Renewal <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control select2" name="renewal_type"
                                                    id="renewal_type">
                                                    <option value="">Is Renewal Needed</option>
                                                    <option value="yes"
                                                        {{ (isset($booking) && $booking->renewal_type == 'yes') || old('renewal_type') == 'yes' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    <option value="no"
                                                        {{ (isset($booking) && $booking->renewal_type == 'no') || old('renewal_type') == 'no' ? 'selected' : '' }}>
                                                        No</option>
                                                </select>
                                                <span class="text-danger"
                                                    id="error-renewal_type">{{ $errors->first('renewal_type') }}</span>
                                            </div>
                                        </div>

                                        <!-- Buffer Days -->
                                        <div class="form-group row mt-3 buffer-days-group">
                                            <label for="buffer_days"
                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                Notice Period <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control f-14" name="buffer_days"
                                                    id="buffer_days">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price Breakdown Column -->
                                    <div class="col-md-5">
                                        <div class="card">
                                            <div class="card-header bg-light">
                                                <h5 class="card-title mb-0">Price Breakdown</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered price-breakdown-table"
                                                    style="display: none;">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pricing Type</td>
                                                            <td id="displayPricingType"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Number of Days</td>
                                                            <td id="displayNumberOfDays"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Base Price</td>
                                                            <td id="displayTotalPrice"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cleaning Fee</td>
                                                            <td id="displayCleaningFee"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Security Fee</td>
                                                            <td>
                                                                <input type="text" id="displaySecurityFee">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Guest Fee</td>
                                                            <td id="displayGuestFee"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Host Service Charge</td>
                                                            <td id="displayHostServiceCharge"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Guest Service Charge</td>
                                                            <td id="displayGuestServiceCharge"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>IVA Tax</td>
                                                            <td id="displayIvaTax"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accommodation Tax</td>
                                                            <td id="displayAccommodationTax"></td>
                                                        </tr>
                                                        <tr class="table-info">
                                                            <td><strong>Total Price</strong></td>
                                                            <td id="displayTotalPriceWithAll"><strong></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-info pull-right text-white f-14" type="submit"
                                    name="submit">Submit</button>
                                <button type="button" class="btn btn-default cls-reload f-14  closeButtonForModal"
                                    data-bs-dismiss="modal">Close</button>
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
