@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .month-calendar {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .month-header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            background-color: #f5f5f5;
            padding: 5px;
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
            border: 1px solid transparent;
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
            background-color: yellow;
            /* Highlight color for the current date */
            font-weight: bold;
        }

        .disabled {
            color: lightgray;
            /* Color for disabled dates */
        }

        .calendar-day.booked-paid {
            background-color: #d32f2f;
            /* Light red */
            color: #e8f5e9;
        }

        .calendar-day.booked-not-paid {
            background-color: #388e3c;
            /* Light green */
            color: #e8f5e9;
        }

        .calendar-day.maintainence {
            background-color: #FFA500;
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
                                    <div class="modal-header">
                                        <h4 class="modal-title booking-modal f-18">
                                            Add Booking</h4>
                                        <a type="button" class="close cls-reload f-18" data-bs-dismiss="modal">×</a>
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

                                            <p class="calendar-m-msg" id="model-message"></p>
                                            <input type="hidden" name="booking_id" id="booking_id">
                                            <input type="hidden" name="property_id" id="propertyId" value="">
                                            {{-- <input type="hidden" name="user_id" id="userId" value=""> --}}
                                            <input type="hidden" name="min_stay" value="1">
                                            <input type="hidden" name="booking_added_by" id="booking_added_by"
                                                value="{{ Auth::guard('admin')->id() }}">
                                            <input type="hidden" name="booking_type" value="instant" id="booking_type">
                                            <input type="hidden" name="status" value="pending" id="booking_status">
                                            <div class="form-group row mt-3 user_id">
                                                <label for="user_id"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Customer <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="user_id" id="user_id">
                                                        <option value="">Select a Customer</option>
                                                        <option value="{{ old('user_id') }}" selected>
                                                            {{ old('user_name') }}
                                                        </option>
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
                                            <div class="form-group row mt-3 renewal_type">
                                                <label for="time_period_id"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Time Period <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="time_period_id"
                                                        id="time_period_id">
                                                        <option value="">Select Time Period</option>
                                                        @foreach ($time_periods as $time_period)
                                                            <option value="{{ $time_period->id }}"
                                                                data-days="{{ $time_period->days }}"
                                                                {{ old('time_period_id') == $time_period->id ? 'selected' : '' }}>
                                                                {{ $time_period->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger" id="error-time_period_id">
                                                        {{ $errors->first('time_period_id') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="input_dob"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Start Date
                                                    <em class="text-danger">*</em>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control f-14" name="start_date"
                                                        id="start_date" placeholder="Start Date" autocomplete="off"
                                                        value="{{ isset($booking) ? \Carbon\Carbon::parse($booking->start_date)->format('d-m-Y') : old('start_date') }}">
                                                    <span class="text-danger" id="error-start_date">
                                                        {{ $errors->first('start_date') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="clear-both"></div>
                                            <div class="form-group row mt-3">
                                                <label for="input_dob"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    End Date
                                                    <em class="text-danger">*</em>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control f-14" name="end_date"
                                                        id="end_date" placeholder="End Date" autocomplete="off"
                                                        value="{{ isset($booking) ? \Carbon\Carbon::parse($booking->end_date)->format('d-m-Y') : old('end_date') }}">
                                                    <span class="text-danger" id="error-end_date">
                                                        {{ $errors->first('end_date') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="clear-both"></div>
                                            <div class="form-group row mt-3 number_of_guests">
                                                <label for="number_of_guests"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Number of Guests <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-6">
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
                                            <div class="form-group row mt-3 renewal_type">
                                                <label for="renewal_type"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Renewal<span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="renewal_type"
                                                        id="renewal_type">
                                                        <option value="">Is Renewal Needed</option>
                                                        <option value="yes"
                                                            {{ (isset($booking) && $booking->renewal_type == 'yes') || old('renewal_type') == 'yes' ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                        <option value="no"
                                                            {{ (isset($booking) && $booking->renewal_type == 'no') || old('renewal_type') == 'no' ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                    </select>
                                                    <span class="text-danger" id="error-renewal_type">
                                                        {{ $errors->first('renewal_type') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="input_dob"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Status <em class="text-danger">*</em>
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" name="property_date_status"
                                                        id="property_date_status">
                                                        <option value="">--Please Select--</option>
                                                        <option value="booked not paid"
                                                            {{ isset($status) && $status == 'booked not paid' ? 'selected' : '' }}>
                                                            Booked Not Paid</option>
                                                        <option value="booked paid"
                                                            {{ isset($status) && $status == 'booked paid' ? 'selected' : '' }}>
                                                            Booked Paid</option>
                                                        <option value="maintainence"
                                                            {{ isset($status) && $status == 'maintainence' ? 'selected' : '' }}>
                                                            Maintainence</option>
                                                    </select>
                                                    <span class="text-danger" id="error-property_date_status">
                                                        {{ $errors->first('property_date_status') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3 buffer-days-group">
                                                <label for="exampleInputPassword1"
                                                    class="control-label col-sm-3 mt-2 fw-bold">Buffer Days<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control f-14" name="buffer_days"
                                                        id="buffer_days" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-info pull-right text-white f-14" type="submit"
                                                name="submit">Submit</button>
                                            <button type="button" class="btn btn-default cls-reload f-14"
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
            $('#time_period_id').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const daysToAdd = parseInt(selectedOption.data('days'));
                const startDateValue = $('#start_date').val();

                if (startDateValue) {
                    const startDate = moment(startDateValue);

                    if (daysToAdd && daysToAdd > 0) {

                        const endDate = startDate.add(daysToAdd, 'days').format('YYYY-MM-DD');
                        $('#end_date').val(endDate);
                    } else {
                        $('#end_date').val(startDate.format('YYYY-MM-DD'));
                    }
                }
            });


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

            function checkSelections() {
                const propertyId = $('#propertyId').val();
                if (propertyId) {
                    $('.calendar-container').show();
                    renderCalendars();
                } else {
                    $('.calendar-container').hide();
                }
            }

            function renderCalendars() {
                const calendarGrid = $('#calendarGrid');
                calendarGrid.empty();

                const today = moment();

                for (let i = 0; i < 12; i++) {
                    const currentMonth = moment(today).add(i, 'months');
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

                // Fill in empty days
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

                    // Apply color based on property date status
                    if (propertyDates[dateString]) {
                        if (propertyDates[dateString].status === 'booked not paid') {
                            dayDiv.addClass('booked-not-paid');
                        } else if (propertyDates[dateString].status === 'booked paid') {
                            dayDiv.addClass('booked-paid');
                        } else if (propertyDates[dateString].status === 'maintainence') {
                            dayDiv.addClass('maintainence');
                        }
                    }

                    if (currentDate.isSame(today, 'day')) {
                        dayDiv.addClass('current-date');
                    }

                    // All dates are clickable
                    dayDiv.click(function() {
                        const propertyId = $('#property_id').val();
                        const userId = $('#user_id').val();
                        handleDateClick(propertyId, userId, dateString);
                    });

                    daysGrid.append(dayDiv);
                }

                monthDiv.append(daysGrid);
                return monthDiv;
            }

            function handleDateClick(propertyId, userId, date) {
                if (isSelectingStartDate) {
                    $('#start_date').val(date);
                    isSelectingStartDate = false;
                    $('.calendar-container').addClass('selecting-end-date');
                } else {
                    $('#end_date').val(date);

                    // Make the AJAX call
                    const startDate = $('#start_date').val();
                    const endDate = $('#end_date').val();
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
                            start_date: startDate,
                            end_date: endDate,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#booking_form_modal').modal('show');
                            if (response.exists) {
                                // console.log(response.booking);
                                // console.log('dates: ', response.property_dates);
                                // console.log('time period: ', response.time_period);
                                $('#propertyId').val(response.booking.property_id);
                                $('#booking_type').val(response.booking.booking_type);
                                $('#booking_status').val(response.booking.status);
                                $('#booking_id').val(response.booking.id);
                                $('#number_of_guests').val(response.booking.guest);
                                $('#renewal_type').val(response.booking.renewal_type);
                                $('#property_date_status').val(response.property_dates[0].status);
                                $('#min_stay').val(response.property_dates[0].min_stay);
                                $('#buffer_days').val(response.booking.buffer_days);
                                if (response.user) {
                                    let newOption = new Option(response.user.user_name, response.user
                                        .user_id, true, true);
                                    $('#user_id').empty()
                                        .append('<option value="">Select a Customer</option>')
                                        .append(newOption)
                                        .trigger('change');
                                }
                                if (response.time_period) {
                                    // Just set the value and trigger change, keeping existing options
                                    $('#time_period_id').val(response.time_period.time_period_id)
                                        .trigger('change');
                                }
                                $('#start_date').val(response.booking.start_date);
                                $('#end_date').val(response.booking.end_date);
                                $('.booking-modal').text('Edit Booking');
                            } else {
                                $('#booking_id').val('');
                                $('#start_date').val(startDate);
                                $('#end_date').val(endDate);
                                $('#number_of_guests').val(no_of_guests);
                                $('#renewal_type').val(renewal_type);
                                $('#property_date_status').val(property_date_status);
                                $('#propertyId').val(propertyId);
                                $('#user_id').val(userId);
                                $('#booking_type').val(booking_type);
                                $('#booking_status').val(booking_status);
                                $('#user_id').val('').trigger('change');
                                $('#time_period_id').val('').trigger('change');
                                $('#buffer_days').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });

                    isSelectingStartDate = true;
                    $('.calendar-container').removeClass('selecting-end-date');
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
                    property_date_status: {
                        required: true
                    }
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
                    property_date_status: {
                        required: "Please select a Property Status"
                    }
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

                if (!$(this).valid()) {
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
                        $(this).removeClass('booked-not-paid booked-paid maintainence');

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
        });
    </script>
@endsection
