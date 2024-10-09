@extends('admin.template')
@section('main')
    <div class="content-wrapper">
        <!-- Modal -->
        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="modal fade dis-none z-index-high" id="hotel_date_package_admin" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title f-18">
                                                Set Booking for particular dates for {{ $propertyName }}</h4>
                                            <a type="button" class="close cls-reload f-18" data-bs-dismiss="modal">×</a>
                                        </div>
                                        <form method="post" action="{{ route('admin.bookings.store') }}"
                                            class='form-horizontal' id='booking_form'>
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <p class="calendar-m-msg" id="model-message"></p>
                                                <input type="hidden" value="{{ $property_id }}" name="property_id"
                                                    id="property_id">
                                                <input type="hidden" value="{{ $customer_id }}" name="user_id"
                                                    id="customer_id">
                                                <input type="hidden" name="booking_added_by" id="booking_added_by"
                                                    value="{{ Auth::guard('admin')->id() }}">
                                                <input type="hidden" name="booking_type" value="instant" id="booking_type">
                                                <input type="hidden" class="form-control f-14" name="price"
                                                            id='dtpc_price' placeholder="">
                                                <input type="hidden" name="status" value="pending" id="status">
                                                <div class="form-group row mt-3">
                                                    <label for="input_dob"
                                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Customer
                                                        <em class="text-danger">*</em></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control f-14"
                                                            value="{{ $customerName }}" disabled>

                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="input_dob"
                                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Start
                                                        Date
                                                        <em class="text-danger">*</em></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control f-14" name="start_date"
                                                            id='dtpc_start_admin' placeholder="Start Date"
                                                            autocomplete='off'>
                                                        <span class="text-danger"
                                                            id="error-dtpc-start">{{ $errors->first('start_date') }}</span>
                                                    </div>
                                                </div>
                                                <div class="clear-both"></div>
                                                <div class="form-group row mt-3">
                                                    <label for="input_dob"
                                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">End
                                                        Date
                                                        <em class="text-danger">*</em></label>
                                                    <div class="col-sm-6">

                                                        <input type="text" class="form-control f-14" name="end_date"
                                                            id='dtpc_end_admin' placeholder="End Date" autocomplete='off'>
                                                        <span class="text-danger"
                                                            id="error-dtpc-end">{{ $errors->first('end_date') }}</span>
                                                    </div>
                                                </div>
                                                <div class="clear-both"></div>
                                                <div class="form-group row mt-3">
                                                    <label for="input_dob"
                                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">No
                                                        of Guests<em class="text-danger">*</em></label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control f-14" name="number_of_guests"
                                                            id="number_of_guests">
                                                            <option value="">--Please Select--</option>
                                                            @for ($i = 1; $i <= $numberOfGuests; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        <span class="text-danger"
                                                            id="error-number_of_guests">{{ $errors->first('number_of_guests') }}</span>
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
                                                                {{ old('renewal_type') == 'none' ? 'selected' : '' }}>
                                                                None</option>
                                                            <option value="weekly"
                                                                {{ old('renewal_type') == 'weekly' ? 'selected' : '' }}>
                                                                Weekly</option>
                                                            <option value="monthly"
                                                                {{ old('renewal_type') == 'monthly' ? 'selected' : '' }}>
                                                                Monthly</option>
                                                        </select>
                                                        <span class="text-danger"
                                                            id="error-renewal_type">{{ $errors->first('renewal_type') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="input_dob"
                                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status<em
                                                            class="text-danger">*</em></label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control f-14" name="property_date_status"
                                                            id="property_date_status">
                                                            <option value="">--Please Select--</option>
                                                            <option value="Available">Available</option>
                                                            <option value="Not available">Not Available</option>
                                                        </select>
                                                        <span class="text-danger"
                                                            id="error-property_date_status">{{ $errors->first('property_date_status') }}</span>
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
                            <!-- Modal End -->

                            <div class="col-md-12">
                                {{ csrf_field() }}
                                <div class="row">
                                    <h3>Booking Calander for {{ $propertyName }}</h3>
                                    <div class="col-md-12">
                                        <input type="hidden" id="dtpc_property_id" value="{{ $property_id }}">
                                        <div id="calender-dv">
                                            {!! $bookingCalander !!}
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
    <script type="text/javascript">
        'use strict'
        var message = "{{ __('Please enter at least 6 characters.') }}";
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/front.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#booking_form').validate({
                rules: {
                    start_date: {
                        required: true,
                        date: true,
                        dateNotInPast: true
                    },
                    end_date: {
                        required: true,
                        date: true,
                        dateGreaterThan: '#dtpc_start_admin'
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
                    start_date: {
                        required: "Please select a start date",
                        dateNotInPast: "Start date cannot be in the past"
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
                        required: "Please select a Property  Status"
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest('.col-sm-6'));
                }
            });
        });
    </script>
@endsection
