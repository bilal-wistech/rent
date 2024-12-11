@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* Loader Styles */
        #page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush

@section('main')
    <!-- Page Loader -->
    <div id="page-loader">
        <div class="spinner"></div>
    </div>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bookings Edit Form</h1>
                    </div>
                    @include('admin.common.breadcrumb')
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-info">
                            @if (Session::has('error'))
                                <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
                                    <strong>Warning!</strong> Whoops there was an error. Please verify your below
                                    information.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="container my-5">
                                <form method="post" action="{{ route('admin.bookings.update', $booking->id) }}"
                                    class="form-horizontal" id="booking_form">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="min_stay" value="1">
                                    <input type="hidden" name="booking_added_by" id="booking_added_by"
                                        value="{{ Auth::guard('admin')->id() }}">
                                    <input type="hidden" name="booking_type" value="{{ $booking->booking_type }}"
                                        id="booking_type">
                                    <input type="hidden" name="status" value="{{ $booking->status }}" id="booking_status">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row mb-2">
                                                <label for="property_id" class="col-sm-3 col-form-label fw-bold">Property
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2-ajax" name="property_id"
                                                        id="property_id">
                                                        <option value="">Select a Property</option>
                                                        <option value="{{ $booking->property_id ?? old('property_id') }}"
                                                            selected>
                                                            {{ $booking->properties->name ?? old('property_name') }}
                                                        </option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('property_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="user_id" class="col-sm-3 col-form-label fw-bold">Customer
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="user_id" id="user_id">
                                                        <option value="">Select a Customer</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="pricing_type_id" class="col-sm-3 col-form-label fw-bold">Pricing
                                                    <span class="text-danger">*</span>
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
                                            <div class="form-group row mb-2">
                                                <label for="start_date" class="col-sm-3 col-form-label fw-bold">Start Date
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="start_date"
                                                        id="start_date"
                                                        value="{{ isset($booking) ? $booking->start_date : old('start_date') }}">
                                                    <span class="text-danger"
                                                        id="error-start_date">{{ $errors->first('start_date') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="end_date" class="col-sm-3 col-form-label fw-bold">End Date
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="end_date"
                                                        id="end_date"
                                                        value="{{ isset($booking) ? $booking->end_date : old('end_date') }}">
                                                    <span class="text-danger"
                                                        id="error-end_date">{{ $errors->first('end_date') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="number_of_guests"
                                                    class="col-sm-3 col-form-label fw-bold">Number
                                                    of Guests
                                                    <span class="text-danger">*</span></label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="number_of_guests"
                                                        id="number_of_guests">
                                                        <option value="">Select Number of Guests</option>
                                                    </select>
                                                    <span class="text-danger"
                                                        id="error-number_of_guests">{{ $errors->first('number_of_guests') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="renewal_type" class="col-sm-3 col-form-label fw-bold">Renewal
                                                    <span class="text-danger">*</span>
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
                                            <div class="form-group row mb-2">
                                                <label for="buffer_days" class="col-sm-3 col-form-label fw-bold">Notice
                                                    Period
                                                    <span class="text-danger">*</span></label>

                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="buffer_days"
                                                        id="buffer_days" value="{{ $booking->buffer_days }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="booking_type" class="col-sm-3 col-form-label fw-bold">Booking
                                                    Type
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="booking_type"
                                                        id="booking_type">
                                                        <option value="">Select Booking Type</option>
                                                        <option value="request"
                                                            {{ (isset($booking) && $booking->booking_type == 'request') || old('booking_type') == 'request' ? 'selected' : '' }}>
                                                            Request</option>
                                                        <option value="instant"
                                                            {{ (isset($booking) && $booking->booking_type == 'instant') || old('booking_type') == 'instant' ? 'selected' : '' }}>
                                                            Instant</option>
                                                    </select>
                                                    <span class="text-danger"
                                                        id="error-booking_type">{{ $errors->first('booking_type') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="status" class="col-sm-3 col-form-label fw-bold">Booking
                                                    Status
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="status" id="status">
                                                        <option value="">Select Booking Type</option>
                                                        <option value="Accepted"
                                                            {{ (isset($booking) && $booking->status == 'Accepted') || old('status') == 'Accepted' ? 'selected' : '' }}>
                                                            Accepted</option>
                                                        <option value="Cancelled"
                                                            {{ (isset($booking) && $booking->status == 'Cancelled') || old('status') == 'Cancelled' ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                        <option value="Declined"
                                                            {{ (isset($booking) && $booking->status == 'Declined') || old('status') == 'Declined' ? 'selected' : '' }}>
                                                            Declined</option>
                                                        <option value="Pending"
                                                            {{ (isset($booking) && $booking->status == 'Pending') || old('status') == 'Pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                    </select>
                                                    <span class="text-danger"
                                                        id="error-status">{{ $errors->first('status') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="booking_property_status"
                                                    class="col-sm-3 col-form-label fw-bold">Booking
                                                    Property Status
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="booking_property_status"
                                                        id="booking_property_status">
                                                        <option value="">Select Property Status</option>
                                                        <option value="booked paid"
                                                            {{ (isset($booking) && $booking->booking_property_status == 'booked paid') == 'booked paid' ? 'selected' : '' }}>
                                                            Booked Paid</option>
                                                        <option value="booked not paid"
                                                            {{ (isset($booking) && $booking->booking_property_status == 'booked not paid') == 'booked not paid' ? 'selected' : '' }}>
                                                            Booked not paid</option>
                                                        <option value="booked but not fully paid"
                                                            {{ (isset($booking) && $booking->booking_property_status == 'booked but not fully paid') == 'booked but not fully paid' ? 'selected' : '' }}>
                                                            Booked but not fully paid</option>
                                                        <option value="maintainence"
                                                            {{ (isset($booking) && $booking->booking_property_status == 'maintainence') == 'maintainence' ? 'selected' : '' }}>
                                                            Maintainence</option>
                                                    </select>
                                                    <span class="text-danger"
                                                        id="error-status">{{ $errors->first('status') }}</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button class="btn btn-info text-white" style="margin-right: 3px;"
                                                    type="submit" name="submit">Submit</button>
                                                <button type="button"
                                                    class="btn btn-default cls-reload closeButtonForModal"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                                                    <input type="text" id="displaySecurityFee"
                                                                        value="{{ $booking->is_security_refunded == 0 ? number_format($booking->security_money, 2) : number_format(0, 2) }}">
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
                                                                <td id="displayTotalPriceWithAll"><strong></strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="{{ asset('backend/js/add_customer_for_properties.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(window).on('load', function() {
                $('#page-loader').fadeOut('slow', function() {
                    $(this).remove();
                });
            });

            let propertyId = $('#property_id').val();
            let userId = $('#user_id').val();
            handleDateClick(propertyId)

            function handleDateClick(propertyId) {

                const start_date = $('#start_date').val();
                const end_date = $('#end_date').val();

                $.ajax({
                    url: '{{ route('admin.bookings.check-booking-exists') }}',
                    type: 'POST',
                    data: {
                        property_id: propertyId,
                        start_date: start_date,
                        end_date: end_date,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.exists) {
                            // Populate booking fields with response data
                            $('#propertyId').val(response.booking.property_id);
                            // Handle user selection
                            if (response.user) {
                                const userOption = new Option(response.user.user_name, response.user
                                    .user_id, true,
                                    true);
                                $('#user_id')
                                    .empty() // Reset the user dropdown
                                    .append('<option value="">Select a Customer</option>')
                                    .append(userOption)
                                    .trigger('change');
                            }

                            // Handle pricing types
                            const pricingSelect = $('#pricing_type_id');
                            pricingSelect.empty().append(
                                '<option value="">Select Pricing</option>'); // Reset pricing dropdown

                            if (Array.isArray(response.property_price)) {
                                response.property_price.forEach(priceItem => {
                                    if (priceItem.pricing_type) {
                                        const pricingOption = new Option(priceItem.pricing_type
                                            .name,
                                            priceItem.pricing_type.id, true, true);
                                        $(pricingOption)
                                            .attr('data-pricing', priceItem.pricing_type.name)
                                            .attr('data-pricing-amount', priceItem.price);
                                        pricingSelect.append(pricingOption);
                                    }
                                });
                            }
                            pricingSelect.trigger('change');
                            // Populate the "Number of Guests" dropdown dynamically
                            const numberOfGuestsSelect = $('#number_of_guests');
                            numberOfGuestsSelect.empty().append(
                                '<option value="">Select Number of Guests</option>');

                            // Assuming response.booking.guest is the number of guests
                            if (response.booking.guest) {
                                const numberOfGuests = response.booking.guest;

                                // Add options for number of guests (e.g., 1 to 10)
                                for (let i = 1; i <= 10; i++) {
                                    const option = new Option(i, i, i === numberOfGuests, i ===
                                        numberOfGuests);
                                    numberOfGuestsSelect.append(option);
                                }
                            }

                            // Trigger the change event to update any dependent functionality
                            numberOfGuestsSelect.trigger('change');
                            // Set start and end date
                            $('#start_date').val(response.booking.start_date);
                            $('#end_date').val(response.booking.end_date);
                            // $('.booking-modal').text('Edit Booking');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
            // Initialize Select2 for property_id
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
            }).on('select2:select', function(e) {
                // Get the selected property ID
                let propertyId = e.params.data.id;
                // Call the function to update the number of guests
                updateNumberOfGuests(propertyId);
            });
        });


        // Initialize Select2 for host_id
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

        let previousSecurityFee = 0; // Initialize to track the previous value of the security fee

        function updateTotalPrice() {
            // Get the current security fee from the input field
            let currentSecurityFee = parseFloat($('#displaySecurityFee').val()) || 0;

            // Get the current total price with all charges and fees
            let totalPrice = parseFloat($('#displayTotalPriceWithAll').text()) || 0;

            // Calculate the updated total price by adjusting it with the new security fee
            let updatedTotalPrice = totalPrice - previousSecurityFee + currentSecurityFee;

            // Update the displayed values
            $('#displaySecurityFee').val(currentSecurityFee.toFixed(2)); // Update the security fee input
            $('#displayTotalPriceWithAll').text(updatedTotalPrice.toFixed(2)); // Update the total price display
            $('#amount').val(updatedTotalPrice.toFixed(2)); // Set the hidden total price field

            // Update the hidden fields for security fee and total price
            $('input[name="security_fee"]').val(currentSecurityFee);
            $('input[name="total_price_with_charges_and_fees"]').val(updatedTotalPrice);

            // Update the previous security fee value for the next calculation
            previousSecurityFee = currentSecurityFee;
        }

        // Update the total price when the security fee input changes
        $('#displaySecurityFee').on('input', function() {
            updateTotalPrice();
        });

        function getCurrentValues() {
            const $pricingTypeOption = $('#pricing_type_id').find('option:selected');
            return {
                pricingType: $pricingTypeOption.data('pricing'),
                pricingTypeAmount: $pricingTypeOption.data('pricing-amount'),
                startDate: $('#start_date').val(),
                endDate: $('#end_date').val(),
                propertyId: $('#property_id').val()
            };
        }
        const values = getCurrentValues();
        updateCalculations(values.pricingType, values.pricingTypeAmount, values.startDate, values
            .endDate, values.propertyId);
        $('#pricing_type_id, #start_date, #end_date').on('change', function() {
            const values = getCurrentValues();
            updateCalculations(values.pricingType, values.pricingTypeAmount, values.startDate, values
                .endDate, values.propertyId);
        });

        function updateCalculations(pricingType, pricingTypeAmount, startDate, endDate, propertyId) {
            if (pricingType && pricingTypeAmount && startDate && endDate && propertyId) {
                $.ajax({
                    url: '{{ route('calculate-booking-price') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        pricingType: pricingType,
                        pricingTypeAmount: pricingTypeAmount,
                        startDate: startDate,
                        endDate: endDate,
                        propertyId: propertyId
                    },
                    success: function(response) {
                        $('#displayPricingType').text(response.pricingType);
                        $('#displayNumberOfDays').text(response.numberOfDays + ' days');
                        $('#displayTotalPrice').text((response.totalPrice).toFixed(
                            2)); // Update total price
                        $('#displayCleaningFee').text((response.cleaning_fee).toFixed(2));
                        // $('#displaySecurityFee').val((response.security_fee).toFixed(2));
                        $('#displayGuestFee').text((response.guest_fee).toFixed(2));
                        $('#displayHostServiceCharge').text((response.host_service_charge).toFixed(
                            2));
                        $('#displayGuestServiceCharge').text((response.guest_service_charge)
                            .toFixed(2));
                        $('#displayIvaTax').text((response.iva_tax).toFixed(2));
                        $('#displayAccommodationTax').text((response.accomodation_tax).toFixed(2));
                        $('#displayTotalPriceWithAll').text((response.totalPriceWithChargesAndFees)
                            .toFixed(2));
                        $('#amount').val(response.totalPriceWithChargesAndFees.toFixed(2));
                        // Show the table
                        $('.price-breakdown-table').show();
                        const hiddenFields = `
<input type="hidden" name="total_price" value="${response.totalPrice}">
<input type="hidden" name="total_price_with_other_charges" value="${response.totalPriceWithOtherCharges}">
<input type="hidden" name="total_price_with_charges_and_fees" value="${response.totalPriceWithChargesAndFees}">
<input type="hidden" name="host_service_charge" value="${response.host_service_charge}">
<input type="hidden" name="guest_service_charge" value="${response.guest_service_charge}">
<input type="hidden" name="iva_tax" value="${response.iva_tax}">
<input type="hidden" name="accomodation_tax" value="${response.accomodation_tax}">
<input type="hidden" name="cleaning_fee" value="${response.cleaning_fee}">
<input type="hidden" name="security_fee" id="security_fee" value="${response.security_fee}">
<input type="hidden" name="guest_fee" value="${response.guest_fee}">
<input type="hidden" name="rate_multiplier" value="${response.rateMultiplier}">
<input type="hidden" name="number_of_days" value="${response.numberOfDays}">
<input type="hidden" name="per_day_price" value="${response.perDayPrice}">
`;
                        $('#booking_form').append(hiddenFields);
                        // Initial update on page load
                        updateTotalPrice();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }
        }


        function updateNumberOfGuests(propertyId) {
            let selectedGuests =
                "{{ old('number_of_guests', $booking->guest) }}";

            $('#number_of_guests').empty().append('<option value="">Select Number of Guests</option>');

            if (propertyId) {
                let url = "{{ route('admin.bookings.get-number-of-guests', ':property_id') }}".replace(
                    ':property_id', propertyId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let maxGuests = response.numberofguests;
                        for (let i = 1; i <= maxGuests; i++) {
                            $('#number_of_guests').append('<option value="' + i + '" ' + (
                                    selectedGuests == i ? 'selected' : '') + '>' + i +
                                '</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        }

        function toggleBufferDays() {
            // Check if the renewal type is 'yes' and show/hide accordingly
            if ($('#renewal_type').val() === 'yes') {
                $('.buffer-days-group').show();
            } else {
                $('.buffer-days-group').hide();
            }
        }

        // Call the function on page load
        toggleBufferDays();

        // Add event listener for renewal_type change
        $('#renewal_type').on('change', toggleBufferDays);

        // Form validation
        $('#booking_form').validate({
            rules: {
                user_id: {
                    required: true
                },
                time_period_id: {
                    required: true
                },
                start_date: {
                    required: true,
                    date: true
                },
                end_date: {
                    required: true,
                    date: true,
                    dateGreaterThan: '#start_date'
                },
                number_of_guests: {
                    required: true
                },
                renewal_type: {
                    required: true
                },
            },
            messages: {
                user_id: {
                    required: "Please select a Customer"
                },
                time_period_id: {
                    required: "Please select a Time Period"
                },
                start_date: {
                    required: "Please select a start date"
                },
                end_date: {
                    required: "Please select an end date",
                    dateGreaterThan: "End date must be after the start date"
                },
                number_of_guests: {
                    required: "Please select number of guests"
                },
                renewal_type: {
                    required: "Please select a renewal type"
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest('.col-sm-6'));
            }
        });

        // Custom validation method for end date
        $.validator.addMethod("dateGreaterThan", function(value, element, param) {
            var startDate = new Date($(param).val());
            startDate.setHours(0, 0, 0, 0);

            var endDate = new Date(value);
            endDate.setHours(0, 0, 0, 0);

            return this.optional(element) || endDate > startDate;
        }, "End date must be after the start date");
    </script>
@endsection
