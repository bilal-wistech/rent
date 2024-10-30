@extends('admin.template')
@section('main')
    @push('css')
        <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css"/>
        <style>
            .calendar-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); /* Increased minimum width */
                gap: 20px;
                padding: 20px 0;
            }

            .calendar-month {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 15px;
                text-align: center;
                background: white;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }

            .calendar-header {
                font-size: 1.2em;
                font-weight: bold;
                margin-bottom: 15px;
                color: #333;
            }

            .day-names,
            .calendar-days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 2px;
            }

            .day-names div {
                font-weight: 600;
                font-size: 0.85em;
                padding: 8px 2px;
                color: #666;
            }

            .calendar-days div {
                padding: 8px 2px;
                font-size: 0.9em;
                text-align: center;
                border-radius: 4px;
                background-color: #f8f9fa;
                min-height: 35px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .calendar-days div.weekend {
                color: #dc3545;
                font-weight: 600;
            }

            .calendar-days div.today {
                background-color: #e3f2fd;
                font-weight: 600;
                color: #1976d2;
                border: 1px solid #bbdefb;
            }

            .calendar-days div.empty {
                background: transparent;
                border: none;
            }

            .year-navigation {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 20px 0;
                padding: 0 15px;
            }

            .year-navigation a {
                font-size: 1.1em;
                color: #007bff;
                text-decoration: none;
                padding: 8px 16px;
                border-radius: 4px;
                transition: background-color 0.2s;
            }

            .year-navigation a:hover {
                background-color: #f0f0f0;
            }

            .year-select {
                padding: 6px 12px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
                background-color: white;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .calendar-container {
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                }

                .calendar-days div {
                    padding: 6px 1px;
                    font-size: 0.85em;
                    min-height: 32px;
                }

                .day-names div {
                    font-size: 0.8em;
                    padding: 6px 1px;
                }
            }

            .year-navigation {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 20px 0;
            }

            .year-navigation a {
                font-size: 1.2em;
                color: #007bff;
                text-decoration: none;
                padding: 5px 15px;
            }

            .year-select {
                padding: 5px 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
            }
        </style>
    @endpush

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="col-md-12">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Booking Calendar for {{ $property->name ?? '' }} - For
                                            Year: {{ $year }}</h3>
                                    </div>
                                </div>

                                <div class="year-navigation">
                                    <a href="{{ route('admin.bookings.calander', ['property_id' => $property->id, 'year' => $year - 1]) }}">
                                        <i class="fa fa-chevron-left"></i> {{ $year - 1 }}
                                    </a>
                                    <a href="{{ route('admin.bookings.calander', ['property_id' => $property->id, 'year' => $year + 1]) }}">
                                        {{ $year + 1 }} <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>

                                <div class="calendar-container">
                                    @foreach($calendar as $monthNumber => $monthData)
                                        <div class="calendar-month">
                                            <div class="calendar-header">{{ $monthData['name'] }}</div>
                                            <div class="day-names">
                                                <div>Mon</div>
                                                <div>Tue</div>
                                                <div>Wed</div>
                                                <div>Thu</div>
                                                <div>Fri</div>
                                                <div>Sat</div>
                                                <div>Sun</div>
                                            </div>
                                            <div class="calendar-days">
                                                @foreach($monthData['weeks'] as $week)
                                                    @foreach($week as $dayInfo)
                                                        @if(is_null($dayInfo))
                                                            <div class="empty"></div>
                                                        @else
                                                            <div class="{{ $dayInfo['isToday'] ? 'today' : '' }}
                             {{ in_array(Carbon\Carbon::parse($dayInfo['date'])->dayOfWeek, [0, 6]) ? 'weekend' : '' }}"
                                                                 data-date="{{ $dayInfo['date'] }}"
                                                                 style="cursor: pointer; padding: 8px; text-align: center;">
                                                                {{ $dayInfo['day'] }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal fade dis-none z-index-high" id="booking_form_modal" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title booking-modal f-18">
                                                    Add Booking</h4>
                                                <a type="button" class="close cls-reload f-18"
                                                   data-bs-dismiss="modal">×</a>
                                            </div>
                                            <div id="addCustomerForm" style="display: none;">
                                                <form class="form-horizontal" id="customer_form" method="post"
                                                      name="customer_form"
                                                      action="{{ url('admin/add-ajax-customer') }}"
                                                      accept-charset='UTF-8'>
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
                                                            <input type="text" class="form-control f-14"
                                                                   name="first_name"
                                                                   id="first_name" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3">
                                                        <label for="exampleInputPassword1"
                                                               class="control-label col-sm-3 mt-2 fw-bold">Last
                                                            Name<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control f-14"
                                                                   name="last_name"
                                                                   id="last_name" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3">
                                                        <label for="exampleInputPassword1"
                                                               class="control-label col-sm-3 mt-2 fw-bold">Email<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control error f-14"
                                                                   name="email"
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
                                                            <input type="password" class="form-control f-14"
                                                                   name="password"
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
                                                                class="btn btn-success pull-left f-14">Submit
                                                        </button>
                                                        <button type="submit" id="customerModalBtnClose"
                                                                class="btn btn-info pull-left f-14">Close
                                                        </button>
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
                                                    <input type="hidden" name="user_id" id="userId" value="">
                                                    <input type="hidden" name="min_stay" value="1">
                                                    <input type="hidden" name="booking_added_by" id="booking_added_by"
                                                           value="{{ Auth::guard('admin')->id() }}">
                                                    <input type="hidden" name="booking_type" value="instant"
                                                           id="booking_type">
                                                    <input type="hidden" name="status" value="pending"
                                                           id="booking_status">
                                                    <div class="form-group row mt-3 user_id">
                                                        <label for="user_id"
                                                               class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                                            Customer <span class="text-danger">*</span>
                                                        </label>

                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="user_id"
                                                                    id="user_id">
                                                                <option value="">Select a Customer</option>
                                                                <option value="{{ old('user_id') }}" selected>
                                                                    {{ old('user_name') }}
                                                                </option>
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
                                                            <input type="date" class="form-control f-14"
                                                                   name="start_date"
                                                                   id="start_date" placeholder="Start Date"
                                                                   autocomplete="off"
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
                                                                   id="end_date" placeholder="End Date"
                                                                   autocomplete="off"
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
                                                            <select class="form-control f-14"
                                                                    name="property_date_status"
                                                                    id="property_date_status">
                                                                <option value="">--Please Select--</option>
                                                                <option value="booked not paid"
                                                                    {{ isset($status) && $status == 'booked not paid' ? 'selected' : '' }}>
                                                                    Booked Not Paid
                                                                </option>
                                                                <option value="booked paid"
                                                                    {{ isset($status) && $status == 'booked paid' ? 'selected' : '' }}>
                                                                    Booked Paid
                                                                </option>
                                                                <option value="maintainence"
                                                                    {{ isset($status) && $status == 'maintainence' ? 'selected' : '' }}>
                                                                    Maintainence
                                                                </option>
                                                            </select>
                                                            <span class="text-danger" id="error-property_date_status">
                                                                                        {{ $errors->first('property_date_status') }}
                                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3 buffer-days-group">
                                                        <label for="exampleInputPassword1"
                                                               class="control-label col-sm-3 mt-2 fw-bold">Buffer
                                                            Days<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control f-14"
                                                                   name="buffer_days"
                                                                   id="buffer_days" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-info pull-right text-white f-14"
                                                            type="submit"
                                                            name="submit">Submit
                                                    </button>
                                                    <button type="button" class="btn btn-default cls-reload f-14"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 text-left mt-30">
                                        <a data-prevent-default="" href="{{ url('admin/bookings/create') }}"
                                           class="btn btn-large btn-primary f-14">Back</a>
                                    </div>
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
    <script type="text/javascript" src="{{ asset('js/front.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#user_id').select2({
                ajax: {
                    url: '{{ route('admin.bookings.form_customer_search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            term: params.term || null,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
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
            $('.calendar-days div[data-date]').click(function() {
                var date = $(this).data('date'); // Get the date from data attribute
                $('#bookingDate').val(date); // Set the date in the hidden input
                $('#booking_form_modal').modal('show'); // Show the modal
            });
        });
    </script>
@endsection
