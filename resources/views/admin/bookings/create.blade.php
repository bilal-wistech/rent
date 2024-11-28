@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .calendar-grid {
            display: grid;
            margin-top:20px;
            margin-left:50px;
            margin-right:50px;
            padding-bottom: 2rem;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;

        }


        .month-calendar {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .month-header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            background-color: #6C7888;
            color:white;
            padding: 5px;
        }

        .calendar-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 14px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 4px;
        }

        .legend-color.booked-paid {
            background-color: #b81f16c7;
        }

        .legend-color.booked-not-paid {
            background-color: #388e3c;
        }

        .legend-color.maintainence {
            background-color: #f5f544;
        }

        .legend-color.booked-but-not-fully-paid {
            background-color: #000000;
        }

        .weekday-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .calendar-day {
            padding: 5px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #6c78884d;
        }


        .calendar-day:hover {
            background-color: #e9ecef;
            border-radius: 4px;
        }

        .calendar-day.other-month {
            color: #ccc;
            cursor: default;
        }

        .calendar-day.other-month:hover {
            background-color: transparent;
        }

        .current-date {
            background-color: #f5f544;
            color:#e8f5e9
            /* Highlight color for the current date */
            font-weight: bold;
        }

        .disabled {
            color: lightgray;
            /* Color for disabled dates */
        }

        .calendar-day.booked-paid {
            background-color: #b81f16c7;
            /* Light red */
            color: #e8f5e9;
        }

        .calendar-day.booked-not-paid {
            background-color: #388e3c
            /* Light green */
            color: #e8f5e9;
        }

        .calendar-day.maintainence {
            background-color: #FFA500;
            /* orange */
            color: #e8f5e9;
        }

        .calendar-day.booked-but-not-fully-paid {
            background-color: #000000;
            /* orange */
            color: #e8f5e9;
        }

        .select2-dropdown {
            z-index: 9999;
        }

        .select2-container {
            width: 100% !important;
        }

        /* Loading state */
        .loading {
            position: relative;
            pointer-events: none;
            opacity: 0.7;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .year-navigation {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .year-display {
            font-size: 1.2em;
            font-weight: bold;
            padding: 0 20px;
        }

        .calendar-day {
            min-height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .days-grid {
            grid-template-rows: repeat(6, 1fr);
        }

        .modal-dialog {
            max-width: 1000px;
            /* or whatever width works best for your design */
        }

        .price-breakdown-table td {
            padding: 0.5rem;
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

                        <div class="box-body">

                            <div class="form-group row mt-3 property_id">
                                <label for="property_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
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

                        </div>

                        <div class="calendar-container">
                            <div class="calendar-grid" id="calendarGrid"></div>
                        </div>
                        <div class="modal fade dis-none z-index-high" id="booking_form_modal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header bg-light ">
                                        <h4 class="modal-title booking-modal f-18">
                                            Add Booking</h4>
                                        <a type="button" class="close cls-reload f-18 closeButtonForModal "
                                            data-bs-dismiss="modal">×</a>
                                    </div>

                                    <div id="addCustomerForm" style="display: none;">
                                        <form class="form-horizontal" id="customer_form" method="post" name="customer_form"
                                            action="{{ url('admin/add-ajax-customer') }}" accept-charset='UTF-8'>
                                            {{ csrf_field() }}

                                            <h4 class="text-info text-center ml-40">Customer Information</h4>
                                            <input type="hidden" name="default_country" id="default_country"
                                                class="form-control">
                                            <input type="hidden" name="carrier_code" id="carrier_code"
                                                class="form-control">
                                            <input type="hidden" name="formatted_phone" id="formatted_phone"
                                                class="form-control">

                                            <div class="form-group row mt-3">
                                                <label for="exampleInputPassword1"
                                                    class="control-label col-sm-3 mt-2 fw-bold">First
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control f-14" name="first_name"
                                                        id="first_name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="exampleInputPassword1"
                                                    class="control-label col-sm-3 mt-2 fw-bold">Last
                                                    Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control f-14" name="last_name"
                                                        id="last_name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="exampleInputPassword1"
                                                    class="control-label col-sm-3 mt-2 fw-bold">Email<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control error f-14" name="email"
                                                        id="email" placeholder="">
                                                    <div id="emailError"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="exampleInputPassword1"
                                                    class="control-label col-sm-3 mt-2 fw-bold">Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="tel" class="form-control f-14" id="phone"
                                                        name="phone">
                                                    <span id="phone-error" class="text-danger"></span>
                                                    <span id="tel-error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="Password"
                                                    class="control-label col-sm-3 mt-2 fw-bold">Password<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control f-14" name="password"
                                                        id="password" placeholder="">
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
                                                    class="btn btn-success pull-left f-14">Submit</button>
                                                <button type="submit" id="customerModalBtnClose"
                                                    class="btn btn-info pull-left f-14">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <form method="post" action="{{ route('admin.bookings.store') }}"
                                        class='form-horizontal' id='booking_form'>
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- Form Column -->
                                                <div class="col-md-7">
                                                    <p class="calendar-m-msg" id="model-message"></p>
                                                    <!-- Hidden inputs -->
                                                    <input type="hidden" name="booking_id" id="booking_id">
                                                    <input type="hidden" name="property_id" id="propertyId"
                                                        value="">
                                                    <input type="hidden" name="min_stay" value="1">
                                                    <input type="hidden" name="booking_added_by" id="booking_added_by"
                                                        value="{{ Auth::guard('admin')->id() }}">
                                                    <input type="hidden" name="booking_type" value="instant"
                                                        id="booking_type">
                                                    <input type="hidden" name="status" value="pending"
                                                        id="booking_status">

                                                    <!-- User ID Selection -->
                                                    <div class="form-group row mt-3 user_id">
                                                        <label for="user_id"
                                                            class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                            Customer <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2" name="user_id"
                                                                id="user_id">
                                                                <option value="">Select a Customer</option>
                                                                <option value="{{ old('user_id') }}" selected>
                                                                    {{ old('user_name') }}</option>
                                                            </select>
                                                            <span
                                                                class="text-danger">{{ $errors->first('user_id') }}</span>
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
                                                            <input type="date" class="form-control f-14"
                                                                name="start_date" id="start_date"
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
                                                            <input type="date" class="form-control f-14"
                                                                name="end_date" id="end_date"
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
                                                            <input type="number" class="form-control f-14"
                                                                name="buffer_days" id="buffer_days">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-9 mx-5 mt-3 ">
                                                        <input type="checkbox" name="payment_receipt"
                                                            id="payment_receipt" value="1">
                                                        Generate Payment Receipt
                                                    </div>
                                                    <div class="payment-receipt">
                                                        <div class="form-group row mt-3">
                                                            <label for="payment_date"
                                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                                Payment Date <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control f-14"
                                                                    name="payment_date" id="payment_date">
                                                                <span class="text-danger" id="error-payment_date"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3 paid_through">
                                                            <label for="paid_through"
                                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                                Paid Through <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="paid_through"
                                                                    id="paid_through">
                                                                    <option value="">Select Paid Through</option>
                                                                    <option value="bank">Bank</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="credit card">Credit Card</option>
                                                                </select>
                                                                <span class="text-danger" id="error-paid_through"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3 amount">
                                                            <label for="amount"
                                                                class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                                Amount <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control f-14"
                                                                    name="amount" id="amount">
                                                            </div>
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
                                                                        <td id="displaySecurityFee"></td>
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
                                            <button type="button"
                                                class="btn btn-default cls-reload f-14  closeButtonForModal"
                                                data-bs-dismiss="modal">Close</button>
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
            let calendar;
            let propertyDates = {};
            let isSelectingStartDate = true;
            let currentYear = moment().year();

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
                $('#propertyId').val(e.params.data.id);
                updateNumberOfGuests(e.params.data.id);
                getPropertyDates(e.params.data.id);
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
            $('.closeButtonForModal').on('click', function() {
                document.getElementById('payment_receipt').checked = false;

                $('.payment-receipt').hide();
                $('#payment_date').val('');
                $('#paid_through').val('');
                $('#amount').val('');
            });

            function getCurrentValues() {
                return {
                    pricingType: $('#pricing_type_id').find('option:selected').data('pricing'),
                    pricingTypeAmount: $('#pricing_type_id').find('option:selected').data('pricing-amount'),
                    startDate: $('#start_date').val(),
                    endDate: $('#end_date').val(),
                    propertyId: $('#property_id').val()
                };
            }
            $('#pricing_type_id, #start_date, #end_date').on('change', function() {
                const values = getCurrentValues();
                updateCalculations(values.pricingType, values.pricingTypeAmount, values.startDate, values
                    .endDate, values.propertyId);
            });

            function formatCurrency(amount) {
                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'AED'
                }).format(amount);
            }

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
                            $('#displayTotalPrice').text(formatCurrency(response.totalPrice));
                            $('#displayCleaningFee').text(formatCurrency(response.cleaning_fee));
                            $('#displaySecurityFee').text(formatCurrency(response.security_fee));
                            $('#displayGuestFee').text(formatCurrency(response.guest_fee));
                            $('#displayHostServiceCharge').text(formatCurrency(response
                                .host_service_charge));
                            $('#displayGuestServiceCharge').text(formatCurrency(response
                                .guest_service_charge));
                            $('#displayIvaTax').text(formatCurrency(response.iva_tax));
                            $('#displayAccommodationTax').text(formatCurrency(response
                                .accomodation_tax));
                            $('#displayTotalPriceWithAll').text(formatCurrency(response
                                .totalPriceWithChargesAndFees));
                            $('#amount').val(response
                                .totalPriceWithChargesAndFees);
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
<input type="hidden" name="security_fee" value="${response.security_fee}">
<input type="hidden" name="guest_fee" value="${response.guest_fee}">
<input type="hidden" name="rate_multiplier" value="${response.rateMultiplier}">
<input type="hidden" name="number_of_days" value="${response.numberOfDays}">
<input type="hidden" name="per_day_price" value="${response.perDayPrice}">
`;

                            // Append hidden fields to the form
                            $('#booking_form').append(hiddenFields);
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                        }
                    });
                }
            }

            function updateNumberOfGuests(propertyId) {
                $('#number_of_guests').empty().append('<option value="">Select Number of Guests</option>');

                if (propertyId) {
                    $.ajax({
                        url: 'get-number-of-guests/' + propertyId,
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
            }

            function getPropertyDates(propertyId) {
                $.ajax({
                    url: 'get-property-dates/' + propertyId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        propertyDates = response;
                        checkSelections();
                    }
                });
            }

            function updateYearDisplay() {
                $('.year-display').text(currentYear);
            }

            function checkSelections() {
                const propertyId = $('#propertyId').val();
                if (propertyId) {
                    $('.calendar-container').show();
                    // Clear previous navigation if it exists
                    $('.year-navigation').remove();

                    // Add year navigation when showing calendar
                    $('.calendar-container').prepend(`
<div class="year-navigation text-center mb-4">
    <button class="btn btn-outline-secondary prev-year">&lt; Previous Year</button>
    <span class="year-display mx-3 font-weight-bold">${currentYear}</span>
    <button class="btn btn-outline-secondary next-year">Next Year &gt;</button>
</div>

<div class="calendar-legend text-center mb-3">
    <span class="legend-item">
        <span class="legend-color booked-paid"></span> Booked & Paid
    </span>
    <span class="legend-item">
        <span class="legend-color booked-not-paid"></span> Booked but Not Paid
    </span>
    <span class="legend-item">
        <span class="legend-color maintainence"></span> Maintenance
    </span>
    <span class="legend-item">
        <span class="legend-color booked-but-not-fully-paid"></span> Booked but Not Fully Paid
    </span>
</div>
`);


                    // Reattach event handlers for the newly added buttons
                    $('.prev-year').click(function() {
                        currentYear--;
                        updateYearDisplay();
                        renderCalendars();
                    });

                    $('.next-year').click(function() {
                        currentYear++;
                        updateYearDisplay();
                        renderCalendars();
                    });

                    renderCalendars();
                } else {
                    $('.calendar-container').hide();
                }
            }



            // Modified renderCalendars function to use currentYear
            function renderCalendars() {
                const calendarGrid = $('#calendarGrid');
                calendarGrid.empty();

                // Create a moment object for January 1st of the current year
                const startOfYear = moment().year(currentYear).startOf('year');

                for (let i = 0; i < 12; i++) {
                    const currentMonth = moment(startOfYear).add(i, 'months');
                    const monthCalendar = createMonthCalendar(currentMonth);
                    calendarGrid.append(monthCalendar);
                }
            }

            function createMonthCalendar(month) {
                const monthDiv = $('<div>').addClass('month-calendar');
                monthDiv.append($('<div>').addClass('month-header').text(month.format('MMMM YYYY')));

                const weekdayHeader = $('<div>').addClass('weekday-header');
                moment.weekdaysShort().forEach(day => {
                    weekdayHeader.append($('<div>').text(day));
                });
                monthDiv.append(weekdayHeader);

                const daysGrid = $('<div>').addClass('days-grid');
                const firstDay = moment(month).startOf('month');
                const lastDay = moment(month).endOf('month');
                const today = moment();

                // Fill in empty days at the start
                for (let i = 0; i < firstDay.day(); i++) {
                    daysGrid.append($('<div>').addClass('calendar-day other-month'));
                }

                // Fill in the days of the month
                for (let day = 1; day <= lastDay.date(); day++) {
                    const currentDate = moment(month).date(day);
                    const dateString = currentDate.format('YYYY-MM-DD');

                    const dayDiv = $('<div>')
                        .addClass('calendar-day')
                        .text(day)
                        .data('date', dateString);

                    // Apply status colors
                    if (propertyDates[dateString]) {
                        if (propertyDates[dateString].status === 'booked not paid') {
                            dayDiv.addClass('booked-not-paid');
                        } else if (propertyDates[dateString].status === 'booked paid') {
                            dayDiv.addClass('booked-paid');
                        } else if (propertyDates[dateString].status === 'booked but not fully paid') {
                            dayDiv.addClass('booked-but-not-fully-paid');
                        } else if (propertyDates[dateString].status === 'maintainence') {
                            dayDiv.addClass('maintainence');
                        }
                    }

                    // Highlight current date only if we're in the current year and month
                    if (currentDate.isSame(today, 'day')) {
                        dayDiv.addClass('current-date');
                    }

                    dayDiv.on('click', function(event) {
                        const propertyId = $('#property_id').val();
                        const userId = $('#user_id').val();
                        handleDateClick(propertyId, userId, dateString);
                    });




                    daysGrid.append(dayDiv);
                }

                // Fill in empty days at the end to maintain grid
                const remainingDays = 42 - (firstDay.day() + lastDay.date()); // 42 = 6 rows × 7 days
                for (let i = 0; i < remainingDays; i++) {
                    daysGrid.append($('<div>').addClass('calendar-day other-month'));
                }

                monthDiv.append(daysGrid);
                return monthDiv;
            }


            function handleDateClick(propertyId, userId, date) {
                console.log('Date clicked:', date);
                if (isSelectingStartDate) {
                    $('#start_date').val(date);
                    const startDate = new Date(date);
                    const endDate = new Date(startDate);
                    endDate.setDate(startDate.getDate() + 1);
                    const formattedEndDate = endDate.toISOString().split('T')[0];
                    $('#end_date').val(formattedEndDate);
                    const start_date = $('#start_date').val();
                    const end_date = $('#end_date').val();
                    const no_of_guests = $('#no_of_guests').val();
                    const renewal_type = $('#renewal_type').val();
                    const property_date_status = $('#property_date_status').val();
                    const booking_type = $('#booking_type').val();
                    const booking_status = $('#booking_status').val();


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
                            $('#booking_form_modal').modal('show');

                            if (response.exists) {
                                $('#propertyId').val(response.booking.property_id);
                                $('#booking_type').val(response.booking.booking_type);
                                $('#booking_status').val(response.booking.status);
                                $('#booking_id').val(response.booking.id);
                                $('#number_of_guests').val(response.booking.guest);
                                $('#renewal_type').val(response.booking.renewal_type);
                                $('#property_date_status').val(response.property_dates[0].status);
                                $('#min_stay').val(response.property_dates[0].min_stay);
                                $('#buffer_days').val(response.booking.buffer_days);

                                // Handle user selection
                                if (response.user) {
                                    const userOption = new Option(response.user.user_name, response.user
                                        .user_id, true, true);
                                    $('#user_id')
                                        .empty()
                                        .append('<option value="">Select a Customer</option>')
                                        .append(userOption)
                                        .trigger('change');
                                }

                                // Handle pricing types
                                const pricingSelect = $('#pricing_type_id');
                                pricingSelect.empty().append(
                                    '<option value="">Select Pricing</option>');

                                if (Array.isArray(response.property_price)) {
                                    response.property_price.forEach(priceItem => {
                                        if (priceItem.pricing_type) {
                                            const pricingOption = new Option(priceItem
                                                .pricing_type.name, priceItem.pricing_type
                                                .id, true, true);
                                            $(pricingOption)
                                                .attr('data-pricing', priceItem.pricing_type
                                                    .name)
                                                .attr('data-pricing-amount', priceItem.price);
                                            pricingSelect.append(pricingOption);
                                        }
                                    });
                                }
                                pricingSelect.trigger('change');

                                $('#start_date').val(response.booking.start_date);
                                $('#end_date').val(response.booking.end_date);
                                $('.booking-modal').text('Edit Booking');

                            } else {
                                // Handle new booking
                                $('#booking_id').val('');
                                $('#start_date').val(start_date);
                                $('#end_date').val(end_date);
                                $('#number_of_guests').val(no_of_guests);
                                $('#renewal_type').val(renewal_type);
                                $('#property_date_status').val(property_date_status);
                                $('#propertyId').val(propertyId);
                                $('#booking_type').val(booking_type);
                                $('#booking_status').val(booking_status);
                                $('#user_id').val('').trigger('change');
                                const pricingSelect = $('#pricing_type_id');
                                pricingSelect.empty().append(
                                    '<option value="">Select Pricing</option>');

                                if (Array.isArray(response.property_price)) {
                                    response.property_price.forEach(priceItem => {
                                        if (priceItem.pricing_type) {
                                            const pricingOption = new Option(priceItem
                                                .pricing_type.name, priceItem.pricing_type
                                                .id, false, false);
                                            $(pricingOption)
                                                .attr('data-pricing', priceItem.pricing_type
                                                    .name)
                                                .attr('data-pricing-amount', priceItem.price);
                                            pricingSelect.append(pricingOption);
                                        }
                                    });
                                }
                                pricingSelect.trigger('change');
                                $('#buffer_days').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                    isSelectingStartDate = true;
                }
                updateCalendarSelection();
            }


            function updateCalendarSelection() {
                $('.calendar-day').removeClass('selected in-range');
                const startDate = moment($('#start_date').val());
                const endDate = moment($('#end_date').val());

                $('.calendar-day').each(function() {
                    const date = moment($(this).data('date'));
                    if (date.isSame(startDate, 'day') || date.isSame(endDate, 'day')) {
                        $(this).addClass('selected');
                    } else if (date.isBetween(startDate, endDate)) {
                        $(this).addClass('in-range');
                    }
                });
            }

            function resetDateSelection() {
                $('#start_date, #end_date').val('');
                isSelectingStartDate = true;
                updateCalendarSelection();
            }

            $('#start_date, #end_date').on('change', function() {
                updateCalendarSelection();
            });

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
            $('#booking_form').on('submit', function(e) {
                e.preventDefault();
                if ($('#payment_receipt').is(':checked')) {
                    if ($('#payment_date').val() === '') {
                        $('#error-payment_date').text('Payment Date is required').show();
                        isValid = false;
                    } else {
                        $('#error-payment_date').text('').hide();
                    }
                    if ($('#paid_through').val() === '') {
                        $('#error-paid_through').text('Paid Through is required').show();
                        isValid = false;
                    } else {
                        $('#error-paid_through').text('').hide();
                    }
                    if ($('#amount').val() === '') {
                        $('#amount').addClass('is-invalid');
                        isValid = false;
                    } else {
                        $('#amount').removeClass('is-invalid');
                    }
                } else if (!$(this).valid()) {
                    return false;
                }

                const form = $(this);
                const submitBtn = form.find('button[type="submit"]');
                const formData = new FormData(this);

                // Disable submit button to prevent double submission
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Close the modal
                            $('#booking_form_modal').modal('hide');

                            // Reset form
                            form[0].reset();

                            // Update calendar with new booking data
                            const propertyId = $('#propertyId').val();
                            getPropertyDates(propertyId);

                            // Reset date selection
                            resetDateSelection();
                            $('.price-breakdown-table').hide();
                            $('#payment_receipt').prop('checked', false);
                            $('.payment-receipt').hide();
                        } else {
                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message || 'Something went wrong!',
                            });
                        }
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessage = '<ul>';

                            Object.keys(errors).forEach(key => {
                                errorMessage += `<li>${errors[key][0]}</li>`;
                                $(`#error-${key}`).text(errors[key][0]);
                            });

                            errorMessage += '</ul>';

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                html: errorMessage
                            });
                        } else {
                            // Handle other errors
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Something went wrong! Please try again.',
                            });
                        }
                    },
                    complete: function() {
                        // Re-enable submit button
                        submitBtn.prop('disabled', false);
                    }
                });
            });

            // Function to update calendar with new booking data
            function updateCalendarWithNewBooking(propertyId, startDate, endDate, status) {
                const start = moment(startDate);
                const end = moment(endDate);

                $('.calendar-day').each(function() {
                    const date = moment($(this).data('date'));

                    if (date.isBetween(start, end, 'day', '[]')) {
                        // Remove existing status classes
                        $(this).removeClass(
                            'booked-not-paid booked-paid maintainence booked-but-not-fully-paid');

                        // Add new status class
                        switch (status) {
                            case 'booked not paid':
                                $(this).addClass('booked-not-paid');
                                break;
                            case 'booked paid':
                                $(this).addClass('booked-paid');
                                break;
                            case 'maintainence':
                                $(this).addClass('maintainence');
                                break;
                            case 'booked but not fully paid':
                                $(this).addClass('booked-but-not-fully-paid');
                                break;
                        }
                    }
                });
            }

            function toggleBufferDays() {
                if ($('#renewal_type').val() === 'yes') {
                    $('.buffer-days-group').show();
                } else {
                    $('.buffer-days-group').hide();
                }
            }

            // Call the function on page load
            toggleBufferDays();

            // Add event listener for renewal_type change
            $('#renewal_type').on('change', function() {
                toggleBufferDays();
            });
            const checkbox = document.getElementById('payment_receipt');
            const paymentReceiptDiv = document.querySelector('.payment-receipt');
            // Initially hide the payment receipt form
            paymentReceiptDiv.style.display = 'none';

            // Add event listener to checkbox
            checkbox.addEventListener('change', function() {
                // Show/hide the payment receipt form based on checkbox state
                paymentReceiptDiv.style.display = this.checked ? 'block' : 'none';

                // Clear form fields when hiding
                if (!this.checked) {
                    document.getElementById('payment_date').value = '';
                    document.getElementById('paid_through').value = '';
                    document.getElementById('amount').value = '';
                }
            });
        });
    </script>
@endsection
