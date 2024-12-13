@extends('admin.template')
@push('css')
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .control-label {
            text-align: left;
        }

        .form-control-static {
            padding: 6px 12px;
            /* background-color: #f7f7f7; */
            border: 1px solid #ddd;
        }
    </style>
@endpush
@section('main')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Payment Receipt <small>Create</small></h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('payment-receipts.store') }}"
                            id="add_payment_receipt" method="post" name="add_payment_receipt" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="box-body">
                                <div class="form-group mt-3 row">
                                    <label for="booking_id" class="control-label col-sm-3">Booked Property<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="booking_id" class="form-control booking_id" id="booking_id"
                                            {{ request('booking_id') ? 'readonly' : '' }}>
                                            <option value="" readonly {{ !request('booking_id') ? 'selected' : '' }}>
                                                Select Booked Property</option>
                                            @foreach ($payment_receipts as $payment_receipt)
                                                <option value="{{ $payment_receipt->id }}" {{-- data-total="{{ $payment_receipt->total }}" --}}
                                                    {{ request('booking_id') == $payment_receipt->id ? 'selected' : '' }}>
                                                    {{ $payment_receipt->id . ' - ' . $payment_receipt->properties->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="paid_through" class="control-label col-sm-3">Paid Through<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="paid_through" class="form-control">
                                            <option value="" disabled selected>Select Paid Through</option>
                                            <option value="bank" {{ old('paid_through') == 'bank' ? 'selected' : '' }}>
                                                Bank</option>
                                            <option value="cash" {{ old('paid_through') == 'cash' ? 'selected' : '' }}>
                                                Cash</option>
                                            <option value="credit card"
                                                {{ old('paid_through') == 'credit card' ? 'selected' : '' }}>
                                                Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="payment_date" class="control-label col-sm-3">Payment Date<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="payment_date" id="payment_date"
                                            value="{{ old('payment_date') }}">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="amount" class="control-label col-sm-3">Payment Amount<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            value="{{ old('amount') }}">
                                        <small id="amount_error" class="text-danger d-none"></small>
                                    </div>
                                </div>
                                <input type="hidden" name="remaining_amount" id="remaining_amount">
                            </div>

                            <div class="box-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-info f-14 text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('validate_script')
    <script>
        $(document).ready(function() {
            $('#booking_id').select2(); // Initialize Select2 for better dropdown styling

            function fetchBookingDetails(bookingId) {
                if (bookingId) {
                    // Make the AJAX request
                    $.ajax({
                        url: "{{ route('payment-receipts.get-booking-details', '') }}/" + bookingId,
                        method: 'GET',
                        success: function(response) {
                            // console.log(response);

                            // Populate the amount input field with the remaining amount
                            const remainingAmount = response.totalBookingAmount - response.totalAmount;
                            $('#amount').val(remainingAmount);
                            $('#remaining_amount').val(remainingAmount);
                            // Optionally display remaining payment details
                            if (response.totalAmount < response.totalBookingAmount) {
                                $('#amount_error')
                                    .text(`Remaining payment is ${remainingAmount.toFixed(2)}`)
                                    .removeClass('d-none');
                            } else {
                                $('#amount_error').addClass('d-none');
                            }

                            // Store remaining amount in a data attribute for validation
                            $('#amount').data('remaining', remainingAmount);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText); // Log the error for debugging
                            alert('Error fetching booking details. Please try again.');
                        }
                    });
                } else {
                    // Clear the amount field if no booking is selected
                    $('#amount').val('');
                    $('#amount_error').addClass('d-none');
                }
            }

            // Handle dropdown change
            $('#booking_id').change(function() {
                const bookingId = $(this).val();
                fetchBookingDetails(bookingId);
            });

            // Fetch details for default selected value on page load
            const defaultBookingId = $('#booking_id').val();
            if (defaultBookingId) {
                fetchBookingDetails(defaultBookingId);
            }

            // Handle form submission
            $('#add_payment_receipt').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                const bookingId = $('#booking_id').val();
                const enteredAmount = parseFloat($('#amount').val());
                const remainingAmount = parseFloat($('#amount').data('remaining'));

                // Reset error message
                $('#amount_error').addClass('d-none').text('');

                if (!enteredAmount || enteredAmount <= 0) {
                    $('#amount_error')
                        .removeClass('d-none')
                        .text('Amount must be greater than zero.');
                    return false;
                }

                if (enteredAmount > remainingAmount) {
                    $('#amount_error')
                        .removeClass('d-none')
                        .text(
                            `Entered amount (${enteredAmount}) cannot exceed the remaining amount (${remainingAmount}).`
                        );
                    return false;
                }

                // Validation passed, submit the form
                this.submit();
            });
        });
    </script>
@endsection
