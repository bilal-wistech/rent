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
                            <div class="form-group row mt-3 host_id">
                                <label for="host_id" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                    Customer <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-6">
                                    <select class="form-control select2" name="user_id" id="host_id">
                                        <option value="">Select a Customer</option>
                                        <option value="{{ old('user_id') }}" selected>{{ old('user_name') }}
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                </div>
                                <div class="col-sm-1">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#customerModal"
                                        class=" btn btn-primary btn-sm customer-modal"><span class="fa fa-user"></span></a>
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
                                        <h4 class="modal-title f-18">
                                            Add Booking</h4>
                                        <a type="button" class="close cls-reload f-18" data-bs-dismiss="modal">×</a>
                                    </div>
                                    <form method="post" action="{{ route('admin.bookings.store') }}"
                                        class='form-horizontal' id='booking_form'>
                                        {{ csrf_field() }}
                                        <div class="modal-body">

                                            <p class="calendar-m-msg" id="model-message"></p>
                                            <input type="hidden" name="property_id" id="propertyId" value="">
                                            <input type="hidden" name="user_id" id="userId" value="">

                                            <input type="hidden" name="booking_added_by" id="booking_added_by"
                                                value="{{ Auth::guard('admin')->id() }}">
                                            <input type="hidden" name="booking_type" value="instant" id="booking_type">
                                            <input type="hidden" name="status" value="pending" id="status">

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
                                                    <span class="text-danger" id="error_start_date">
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
                                                    <span class="text-danger" id="error_end_date">
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
                                                    <span
                                                        class="text-danger">{{ $errors->first('number_of_guests') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3 renewal_type">
                                                <label for="renewal_type"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                    Renewal Type <span class="text-danger">*</span>
                                                </label>

                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="renewal_type"
                                                        id="renewal_type">
                                                        <option value="">Select a Renewal Type</option>
                                                        <option value="none"
                                                            {{ (isset($booking) && $booking->renewal_type == 'none') || old('renewal_type') == 'none' ? 'selected' : '' }}>
                                                            None
                                                        </option>
                                                        <option value="weekly"
                                                            {{ (isset($booking) && $booking->renewal_type == 'weekly') || old('renewal_type') == 'weekly' ? 'selected' : '' }}>
                                                            Weekly
                                                        </option>
                                                        <option value="monthly"
                                                            {{ (isset($booking) && $booking->renewal_type == 'monthly') || old('renewal_type') == 'monthly' ? 'selected' : '' }}>
                                                            Monthly
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
                                                        <option value="Available"
                                                            {{ isset($status) && $status == 'Available' ? 'selected' : '' }}>
                                                            Available</option>
                                                        <option value="Not available"
                                                            {{ isset($status) && $status == 'Not available' ? 'selected' : '' }}>
                                                            Not Available</option>
                                                    </select>
                                                    <span class="text-danger" id="error-property_date_status">
                                                        {{ $errors->first('property_date_status') }}
                                                    </span>
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
                        <div class="modal" id="customerModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="theModalLabel"></h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" id="signup_form" method="post" name="signup_form"
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
                                                    class="btn btn-info pull-left f-14">Submit</button>
                                                <button class="btn btn-danger pull-left f-14"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
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
    <script src="{{ asset('backend/js/add_customer_for_properties.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            let calendar;
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

            function checkSelections() {
                const propertyId = $('#property_id').val();
                const hostId = $('#host_id').val();
                if (propertyId && hostId) {
                    $('.calendar-container').show();
                    renderCalendars();
                } else {
                    $('.calendar-container').hide();
                }
            }

            // Event listeners for changes
            $('#property_id').on('change', checkSelections);
            $('#host_id').on('change', checkSelections);

            function renderCalendars() {
                const calendarGrid = $('#calendarGrid');
                calendarGrid.empty();

                const today = moment();

                // Create 12 month calendars
                for (let i = 0; i < 12; i++) {
                    const currentMonth = moment(today).add(i, 'months');
                    const monthCalendar = createMonthCalendar(currentMonth);
                    calendarGrid.append(monthCalendar);
                }
            }

            function createMonthCalendar(month) {
                const monthDiv = $('<div>').addClass('month-calendar');

                // Add month header
                monthDiv.append($('<div>').addClass('month-header').text(month.format('MMMM YYYY')));

                // Add weekday header
                const weekdayHeader = $('<div>').addClass('weekday-header');
                moment.weekdaysShort().forEach(day => {
                    weekdayHeader.append($('<div>').text(day));
                });
                monthDiv.append(weekdayHeader);

                // Add days grid
                const daysGrid = $('<div>').addClass('days-grid');
                const firstDay = moment(month).startOf('month');
                const lastDay = moment(month).endOf('month');
                const today = moment(); // Current date

                // Fill in days before the first of the month
                for (let i = 0; i < firstDay.day(); i++) {
                    daysGrid.append($('<div>').addClass('calendar-day other-month'));
                }

                // Fill in the days of the month
                for (let day = 1; day <= lastDay.date(); day++) {
                    const currentDate = moment(month).date(day);
                    const dayDiv = $('<div>')
                        .addClass('calendar-day')
                        .text(day)
                        .data('date', currentDate.format('YYYY-MM-DD'));

                    // Check if the current date is today
                    if (currentDate.isSame(today, 'day')) {
                        dayDiv.addClass('current-date'); // Highlight today
                    }

                    // Disable past dates
                    if (currentDate.isBefore(today, 'day')) {
                        dayDiv.addClass('disabled'); // Add a disabled class for styling
                        dayDiv.css('pointer-events', 'none'); // Disable clicks
                    } else {
                        dayDiv.click(function() {
                            const clickedDate = $(this).data('date');
                            const propertyId = $('#property_id').val();
                            const userId = $('#host_id').val();
                            handleDateClick(propertyId, userId, clickedDate);
                        });
                    }

                    daysGrid.append(dayDiv);
                }

                monthDiv.append(daysGrid);
                return monthDiv;
            }


            function handleDateClick(propertyId, userId, date) {
                // You can customize this function to handle the date click
                $('#propertyId').val(propertyId);
                $('#userId').val(userId);
                // Show the modal
                $('#booking_form_modal').modal('show');
            }
        });
    </script>
@endsection
